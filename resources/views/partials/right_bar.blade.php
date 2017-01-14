
    <h3 class="text-center">Категории</h3>
    <div class="list-group">
        @foreach(App\Categories::all() as $cat)
            <a href={{route('categories',$cat->id)}} class="list-group-item">
                <h4 class="list-group-item-heading text-right">{{$cat->title}}</h4>
            </a>
        @endforeach
    </div>


