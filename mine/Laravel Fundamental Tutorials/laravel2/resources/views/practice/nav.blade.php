<nav>
    <ul id="nav">
    <li class="nav"><a class="active nav-anchor" href="#home">Home</a></li>
    <li class="nav"><a class="nav-anchor" href="#news">News</a></li>


    <li class="nav"><a class="nav-anchor" href="">{{ link_to_action('CrudsController@show', $latest->title, [$latest->id]) }}</a></li>



  </ul>
</nav>
