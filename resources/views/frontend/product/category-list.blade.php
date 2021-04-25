@if( count($category->products) || count($category->subCategoryProducts) )
@if($category->parentCategory)
@include('frontend.product.category-list', ['category' => $category->parentCategory])
@endif
<li class="breadcrumb-item">
    <a class="" href="{{route('frontend.collections', ['category' => $category->slug])}}">
        {{$category->name}}
    </a>
</li>
@endif
