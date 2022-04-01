<div id="carouselExampleIndicators" class="p-5 carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="sub-img-student d-block w-100"  src="{{asset('images/thumbnails/Vendor Activty.png')}}" alt="Vendor Activty">
        </div>
        <div class="carousel-item">
            <a class="merName" href="{{route('categories.deals', $category=6)}}" target="_blank">
                <img class="sub-img-student d-block w-100" src="{{asset('images/mainCats_imgs/Student_exclusive.png')}}" alt="Student exclusive" >
            </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
