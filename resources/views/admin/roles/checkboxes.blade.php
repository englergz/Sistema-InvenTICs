@foreach ($roles as $role)
    <div class="checkbox">
        <label>
            <input name="roles[]" type="checkbox" value="{{ $role->name }}"
                {{ $user->roles->contains($role->id) ? 'checked':'' }}>
            {{' '.$role->display_name }} <br>
            @if($role->name == 'Admin')
                <small class="text-muted">Todos los permisos</small>
            @else
                <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
            @endif
        </label>
    </div>
@endforeach
