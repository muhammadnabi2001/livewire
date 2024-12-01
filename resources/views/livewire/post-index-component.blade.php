<div>
    {{-- The whole world belongs to you. --}}
        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container position-relative">
              <h1>Blog</h1>
              <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
              <nav class="breadcrumbs">
                <ol>
                  <li><a href="index.html">Home</a></li>
                  <li class="current">Blog</li>
                </ol>
              </nav>
            </div>
          </div><!-- End Page Title -->
      
          <!-- Blog Posts Section -->
          <section id="blog-posts" class="blog-posts section">
      
            <div class="container">
              <div class="row gy-4">
                @foreach($posts as $post)
                  
                <div class="col-lg-4">
                  <article>
      
                    <div class="post-img">
                      <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>
      
                    <p class="post-category">{{$post->title}} </p>
      
                    <h2 class="title">
                      <a href="blog-details.html">{{$post->description}} </a>
                    </h2>
      
                    <div class="d-flex align-items-center">
                      <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                      <div class="post-meta">
                        <p class="post-author">Maria Doe</p>
                        <p class="post-date">
                          <time datetime="2022-01-01">{{$post->created_at}} </time>
                        </p>
                      </div>
                    </div>
      
                  </article>
                </div><!-- End post list item -->
      
                @endforeach
      
                
              </div>
            </div>
      
          </section><!-- /Blog Posts Section -->
      
          <!-- Blog Pagination Section -->
          <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
        
      
</div>
