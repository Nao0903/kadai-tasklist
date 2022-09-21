<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{--トップページのリンク--}}
        <a class="navbar-brand" href="/">TaskList</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
                {{--タスク作成ページへのリンク--}}
                <li class="nav-item">{!! link_to_route('tasks.create','タスク追加', [] ,['class' => 'nav-link']) !!}</ul>
            </ul>
        </div>
     </nav>
</header>