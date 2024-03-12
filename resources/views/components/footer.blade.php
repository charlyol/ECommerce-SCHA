<footer class="footer p-10 bg-red-600 text-base-content">
    <aside>
        <a href="{{ route('Home') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
        </a>
    </aside>
    <nav>
        <h6 class="footer-title">Catégorie</h6>
        <div style="column-count: 2;">

            @php
                $categories = \App\Models\Category::pluck('name');
            $totalCategories = $categories->count();
            $half = ceil($totalCategories / 2);
            @endphp

            <div>
                @foreach($categories->take($half) as $id => $name)
                    <div><a class="link link-hover" href="?sort=name {{ isset($sort) && $sort === 'name' }}">{{ $name }}</a></div>
                @endforeach
            </div>

            <div>
                @foreach($categories->slice($half) as $id => $name)
                    <div><a class="link link-hover" href="?sort=name {{ isset($sort) && $sort === 'name' }}">{{ $name }}</a></div>
                @endforeach
            </div>
        </div>
    </nav>
        <nav>
            <h6 class="footer-title">Compagnie</h6>
            <a class="link link-hover">A propos</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Postes à pourvoir</a>
            <a class="link link-hover">Press kit</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover">Conditions Générales d'Utilisation</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </nav>

</footer>
