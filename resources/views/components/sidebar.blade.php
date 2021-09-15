{{--@php--}}
{{--$links = [--}}
{{--    [--}}
{{--        "href" => "admin.dashboard",--}}
{{--        "text" => "Dashboard",--}}
{{--        "is_multi" => false,--}}
{{--    ],--}}

{{--    [--}}
{{--        "href" => [--}}
{{--            [--}}
{{--                "section_text" => "User",--}}
{{--                "section_list" => [--}}
{{--                    ["href" => "admin.user", "text" => "Data User"],--}}
{{--                    ["href" => "admin.user.new", "text" => "Buat User"]--}}
{{--                ]--}}
{{--            ]--}}
{{--        ],--}}
{{--        "text" => "User",--}}
{{--        "icon"=>"fa-users",--}}
{{--        "is_multi" => true,--}}
{{--    ],--}}
{{--];--}}
{{--$navigation_links = array_to_object($links);--}}
{{--@endphp--}}

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        {{--        @foreach ($navigation_links as $link)--}}
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if(auth()->user()->role==1)
                <li class="menu-header">Calistung</li>
                <li class="">
                    <a class="nav-link" href="{{ route('admin.calistung') }}">
                        <i class="fas fa-fire"></i><span>Hasil Calistung</span>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{ route('admin.aspect.index') }}">
                        <i class="fas fa-fire"></i><span>Aspek - Calistung</span>
                    </a>
                </li>

                <li class="">
                    <a class="nav-link" href="{{ route('admin.question.index') }}">
                        <i class="fas fa-question"></i><span>Pertanyaan - Calistung</span>
                    </a>
                </li>
                <li class="menu-header">Pretest</li>

                <li class="">
                    <a class="nav-link" href="{{ route('admin.pretest') }}">
                        <i class="fas fa-fire"></i><span>Hasil Pretest</span>
                    </a>
                </li>

                <li class="">
                    <a class="nav-link" href="{{ route('admin.pretest-aspect.index') }}">
                        <i class="fas fa-fire"></i><span>Aspek - Pretest</span>
                    </a>
                </li>

                <li class="">
                    <a class="nav-link" href="{{ route('admin.pretest-question.index') }}">
                        <i class="fas fa-question"></i><span>Pertanyaan - Pretest</span>
                    </a>
                </li>
            @endif

        </ul>
    </aside>
</div>
