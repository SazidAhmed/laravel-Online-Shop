<div class="carousel-item active">
  @foreach($randomActiveProducts as $product)
  <div class="col-md-4 mb-5">
    <div class="card card-cascade narrower card-ecommerce">
      <div class="view view-cascade overlay">
        <img src="storage/product/{{$product->image}}" class="card-img-top"
          alt="sample photo">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <div class="card-body card-body-cascade text-center">
        <a href="" class="text-muted">
          <h5>{{$product->category->name??''  }}</h5>
        </a>
        <h4 class="card-title my-4">
          <strong>
            <a href="">{{$product->name}}</a>
          </strong>
        </h4>
        <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
          consectetur, adipisci.
        </p>
        <div class="card-footer px-1">
          <span class="float-left">69$</span>
          <span class="float-right">
            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick Look">
              <i class="fas fa-eye ml-3"></i>
            </a>
            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist">
              <i class="fas fa-heart ml-3"></i>
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>