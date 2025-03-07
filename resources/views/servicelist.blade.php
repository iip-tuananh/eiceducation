@extends('layouts.main.master')
@section('title')
{{$detail_service->name}}
@endsection
@section('description')
{{languageName($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@section('css')
<style>
   .service-sidebar {
    position: sticky;
    top: 80px;
}
</style>
@endsection
@section('js')


@endsection
@section('content')
<main class="main">

   <!-- breadcrumb -->
   <div class="site-breadcrumb" style="background: url({{url('frontend/img/breadcrumb.jpg')}})">
       <div class="container">
           <h2 class="breadcrumb-title">{{$detail_service->name}}</h2>
           <ul class="breadcrumb-menu">
               <li><a href="{{route('home')}}">Trang chủ</a></li>
               <li class="active">{{$detail_service->name}}</li>
           </ul>
       </div>
   </div>
   <!-- breadcrumb end -->


   <!-- service single -->
   <div class="service-single py-120">
       <div class="container">
           <div class="service-single-wrap">
               <div class="row">
                  <div class="col-xl-8 col-lg-8">
                     <div class="service-details">
                         <div class="content">
                             <h1 class="mb-20 title-content">{{$detail_service->name}}</h1>
                             {!!languageName($detail_service->content)!!}
                         </div>
                     </div>
                 </div>
                   <div class="col-xl-4 col-lg-4">
                       <div class="service-sidebar">
                           <div class="widget">
                               <h4 class="title">Dịch vụ khác</h4>
                               <div class="category">
                                 @foreach ($servicehome as $item)
                                 <a href="{{route('serviceCateList',['slug'=>$item->slug])}}"><i class="far fa-angle-double-right"></i>{{$item->name}}</a>
                                 @endforeach
                               </div>
                           </div>
                           @include('layouts.main.sidebar')
                       </div>
                   </div>
                   
               </div>
           </div>
       </div>
   </div>
   <!-- service single end -->

</main>
@endsection