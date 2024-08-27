  <div class="testimonials" id="testimonials">
      <h1>What Our Students Say</h1>
      <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
      <div class="swiper testimonial-slider">
          <div class="swiper-wrapper">

              @foreach($testimonialdata as $data)
              <div class="swiper-slide testimonial-col">
                  <img src="{{ asset('banners/' . $data->image) }}" alt="User Image">
                  <p>{{ $data->message }}</p>
                  <h3>{{ $data->name }}</h3>
                  <div class="stars">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                  </div>
              </div>
              @endforeach
          </div>
          <!-- Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Navigation -->

      </div>
  </div>