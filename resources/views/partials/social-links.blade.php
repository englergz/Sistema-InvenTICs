<div class="buttons-social-media-share">
  <ul class="share-buttons">
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{ $description }}" 
        title="Compartir en Facebook" 
        target="_blank">
        <img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png">
      </a>
    </li>
    <li>
      <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $description }}&via={{ config('app.name') }}&hashtags={{ config('app.name') }}" 
        title="Tweet" 
        target="_blank">
        <img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
      </a>
    </li>
    <li>
      <a href="https://plus.google.com/share?url={{ request()->fullUrl() }}" 
        title="Compartir en Google+" 
        target="_blank">
        <img alt="Share on Google+" src="/img/flat_web_icon_set/Google-plus.png">
      </a>
    </li>
    <li>
      <a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $description }}" 
        title="Pin it" 
        target="_blank">
        <img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png">
      </a>
    </li>
  </ul>
</div>