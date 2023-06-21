<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Trademark;
use App\Models\LogHistory;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class PostsController extends Controller
{
    

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::class,
        ]);
    }

    public function create()
    {
        $post = new post;

        $this->authorize('create', $post);
        $now = Carbon::now();

        return view('admin.posts.create', [
            'time' => $time = $now->format('H:i'),
            'date' => $date = $now->format('Y-m-d'),
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ 
     */
    public function store(Request $request)
    {
    
        $post = Post::find($request->get('id'));
        $confirmar = Post::find($request->get('confirmar_id'));
        $employee = Employee::find($request->get('employee_id'));
        
        if(is_null($confirmar)){

            if(!is_null($post)){

                $this->validate($request, [
                    'id' => 'required',
                    'employee_id' => 'required',
                    'employee_debtor_since' => 'required',
                    'time' => 'required'
                ]);

                if(is_null($post->employee_id)){
                    $post->employee_id = $employee;
                    $post->update($request->all());

                    $post->employee_debtor_since = Carbon::parse( $request->get('employee_debtor_since')."". $request->get('time'));

                    $auth = auth()->user();
                    $post->assigns_user_id = $auth->id;
                    
                    $post->save();

                    return redirect()->route('admin.posts.edit', $post)
                    ->withFlash('EL dispositivo '
                    .$post->title
                    .' ha sido prestado exitosamente, adjunte foto del estado actual y el acta de entrega');
                }else{
                    return redirect()->route('admin.posts.edit', $post)
                    ->withFlash('¡ERROR! EL dispositivo: '
                    .$post->title
                    .' ¡SE ENCUENTRA OCUPADO!');
                }
            }else{
                $post = new Post;

                $data = $request->validate([
                    'title' => 'required|max:32|min:3',
                    'serial' => 'required|max:32|min:3|unique:posts'
                ]);
        
                $post = Post::create( $request->all() );
                $post->published_at = Carbon::now();
                $post->employee_id = null;
                
                $post->save();    
                $post->syncTags($request->get('tags'));
        
        
                return redirect()->route('admin.posts.index', '#')->withFlash('EL dispositivo ha sido creado exitosamente');
                // return redirect()->route('admin.posts.edit',compact('posts','categories'));
            }
        }else{

            $reporte = new LogHistory;

            $data = $request->validate([
                'obs' => 'required|max:250|min:1'
            ]);

            $reporte = LogHistory::create( $request->all() );
            $auth = auth()->user();

            $reporte->create_user_id = $confirmar->user_id;
            //$reporte->destroy_user_id = $confirmar-> 
            $reporte->assigns_user_id = $confirmar->assigns_user_id;
            $reporte->receives_user_id = $auth->id;

            $reporte->trademark_id = $confirmar->trademark_id; 
            $reporte->serial = $confirmar->serial;
            $reporte->title = $confirmar->title;
            $reporte->url = $confirmar->url; 
            $reporte->iframe = $confirmar->iframe;
            $reporte->body = $confirmar->body;
            $reporte->published_at = $confirmar->published_at; 
            $reporte->category_id = $confirmar->category_id;

            $reporte->employee_id = $confirmar->employee_id;
            $reporte->employee_surname =  $confirmar->employeeDebtor->surname .' '.$confirmar->employeeDebtor->second_surname;
            $reporte->employee_name =  $confirmar->employeeDebtor->first_name.' '.$confirmar->employeeDebtor->second_name;

            $reporte->employee_debtor_since = $confirmar->employee_debtor_since;
            $reporte->employee_debtor_until = Carbon::now(); 
            $reporte->obs = $request->get('obs');
            $reporte->post_id = $confirmar->id;
            $reporte->save(); 


            //post actual
            //$confirmar->employee_debtor_since = Carbon::make(null);
            $confirmar->employee_id = null;
            $confirmar->update($request->all());
            $confirmar->save();
                
            /*DB::update(
                'update posts set employee_id = NULL where id = ?',
                [$request->get('confirmar_id')]
            );*/
            return back()->with('flash', '¡Devolución exitosa!');
        }
        
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        if($post->employee_debtor_since){
            return view('admin.posts.edit', [
                'post' => $post,
                'tags' => Tag::all(),
                'categories' => Category::all(),
                'trademarks' => Trademark::all(),
                'employees' => Employee::all(),

            ]);
        }else{
            return view('admin.posts.edit', [
                'post' => $post,
                'tags' => Tag::all(),
                'categories' => Category::all(),
                'trademarks' => Trademark::all(),
                'employees' => Employee::all()
            ]);
        }
        
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        if(is_null($request->get('show'))){

            $data = $request->validate([
                'title' => 'required|max:32|min:3',
                'serial' => Rule::unique('posts')->ignore($post->id)
            ]);

            $e = $request->get('employee_id');
            if(!is_null($e))
            {
                $this->validate($request, [
                    'employee_debtor_since' => 'required',
                    'time' => 'required'
                ]);
            }

            $post->update($request->all());
            $post->published_at = Carbon::parse( $request->get('published_at'));
            if($request->get('employee_debtor_since')){
                $post->employee_debtor_since = Carbon::parse( $request->get('employee_debtor_since')."". $request->get('time'));
            }
            $post->save();
            $post->syncTags($request->get('tags'));
            return redirect()
                ->route('admin.posts.index')
                ->with('flash', '¡Registro exitoso!');
                
        }else{

            $p = Post::find($request->get('p_id'));
            $p->employee_debtor_since = Carbon::make(null);
            $p->employee_id = null;
            $p->update($request->all());
            $p->save();

            return back()->with('flash', '¡Devolución exitosa!');
        }
    }

    public function createPDF(Post $post)
    {
        $pdf = PDF::loadView('posts.showpdf', compact('post'))
        ->setOptions(['isRemoteEnabled' => true])
        ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }

    public function report()
    {
        $now = Carbon::now();

        return view('admin.posts.report', [
            'time' => $time = $now->format('H:i'),
            'date' => $date = $now->format('Y-m-d'),
            'posts' => Post::all(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ 
     */
    public function getReport(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'enddate' => 'required'
        ]);
        $date = $request->get('date');
        $enddate = $request->get('enddate');
        $p = $request->get('producto');
        
        if( is_null($p) ) 
        {
            //reporte de TODOs
            /*$posts=Post::where("published_at",">=",$f1)
                        ->where("published_at","<=",$f2)
                        ->get();*/
            
            $post = null;
            $posts = Post::whereDate('published_at', '>=', $request->get('date'))->whereDate('published_at', '<=', $request->get('enddate'))->get();

            $pdf = PDF::loadView('admin.posts.productopdf', compact('posts','post','date' ,'enddate'))
            ->setOptions(['isRemoteEnabled' => true])
            ->setOptions(['defaultFont' => 'sans-serif']);
            //$pdf->stream();
            return $pdf->download('reportProductsInvenTICs.pdf');
            //return back()->with('flash', '¡Reporte de todos los productos generado exitosamente!');
        }
        else
        {
            //de uno
            $posts = null;
            $post = Post::find($p);

            $pdf = PDF::loadView('admin.posts.productopdf', compact('post','posts'))
            ->setOptions(['isRemoteEnabled' => true])
            ->setOptions(['defaultFont' => 'sans-serif']);
            //$pdf->stream();
            return $pdf->download('report'.$post->title.'No'.$post->serial.'.pdf');

            //return back()->with('flash', '¡Reporte del producto '. $post->title.' generado exitosamente!');
        }
    }

    public function export(){
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }
}