<div>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Selecao</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="blog.html" class="active">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
  {{-- The whole world belongs to you. --}}
  @if(!$check)
    
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
                <a wire:click='show({{$post->id}})'>{{$post->description}} </a>
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
  @endif
  @if ($check)
  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog Details</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{$postdetail->title}} </h2>
                <h4>{{$postdetail->description}}</h4>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{$postdetail->comments->count()}} Comments</a></li>
                    <li class="d-flex align-items-center"> <a wire:click='like({{$postdetail->id}})'><i class="bi bi-hand-thumbs-up"></i></a> {{$postdetail->likes->where('status',1)->count()}}</li>
                    <li class="d-flex align-items-center"> <a wire:click="dislike({{$postdetail->id}})"><i class="bi bi-hand-thumbs-down"></i></a>{{$postdetail->likes->where('status',0)->count()}}</li>
                  </ul>
                </div><!-- End meta top -->

                

                

              </article>

            </div>
          </section><!-- /Blog Details Section -->

        
          @php
function recursion($comment, $result,$postdetail) {
    // Agar replylar mavjud bo'lsa
    if ($comment->replies->count() > 0) {
        foreach ($comment->replies as $reply) {
            echo "<div id='comment-reply-{$reply->id}' class='comment comment-reply'>";
            echo "<div class='d-flex'>";
            echo "<div class='comment-img'><img src='assets/img/blog/comments-2.jpg' alt=''></div>";
            echo "<div>";
            echo "<h5><a href=''>someone</a> <a wire:click='answer({$reply->id})' class='reply'><i class='bi bi-reply-fill'></i> Reply</a></h5>";
            echo "<time datetime='{$reply->created_at}'>" . $reply->created_at->format('d M, Y') . "</time>";
            echo "<p>{$reply->body}</p>";

            // $result bilan reply idni solishtirish
            if ($result == $reply->id) {
                echo "<section id='comment-form' class='comment-form section'>";
                echo "<div class='container'>";
                echo "<form wire:submit.prevent='commentanswer({$postdetail->id},{$reply->id})'>";
                echo "<h4>Post Reply</h4>";
                echo "<textarea wire:model='body' placeholder='Write your reply here...'></textarea>";
                echo "<button type='submit'>Submit</button>";
                echo "</form>";
                echo "</div>";
                echo "</section>";
            }

            echo "</div>";
            echo "</div>";

            // Har bir reply uchun yana uning replylarini ko'rsatish
            recursion($reply, $result,$postdetail); // `$result`ni o'tkazish
            echo "</div>"; // Replyni tugatish
        }
    }
}
@endphp

          <section id="blog-comments" class="blog-comments section">

            <div class="container">

              <h4 class="comments-count">{{$postdetail->Comments->count()}} Comments</h4>
              @php
                $parentcomments=$postdetail->comments->where('parent_id',0);
              @endphp
              @foreach($parentcomments as $comment)
                
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Georgia Reader</a> <a wire:click="answer({{$comment->id}})" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at}} </time>
                   <p>{{$comment->body}} </p>
                   
                @if($result==$comment->id)
                   <section id="comment-form" class="comment-form section">
                      
                    <div class="container">
        
                      <form wire:submit.prevent='commentanswer({{$postdetail->id}},{{$comment->id}})'>
        
                        <h4>Post Comment</h4>
                        <div class="row">
                          
                        <div class="row">
                          <div class="col form-group">
                            <textarea wire:model="body" class="form-control" placeholder="Your answer*"></textarea>
                          </div>
                        </div>
        
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Your answer</button>
                        </div>
        
                      </form>
        
                    </div>
                  </section><!-- /Comment Form Section -->
                  @endif
                  @php
                recursion($comment,$result,$postdetail)
                @endphp
                  </div>
                </div>
              </div><!-- End comment #1 -->
              
              @endforeach
              
              
          </section><!-- /Blog Comments Section -->

          <!-- Comment Form Section -->
          <section id="comment-form" class="comment-form section">
            <div class="container">

              <form wire:submit.prevent='comment({{$postdetail->id}})'>

                <h4>Post Comment</h4>
                <div class="row">
                  
                <div class="row">
                  <div class="col form-group">
                    <textarea wire:model="body" class="form-control" placeholder="Your Comment*"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Blog Author Widget -->
            <div class="blog-author-widget widget-item">

              <div class="d-flex flex-column align-items-center">
                <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                <h4>Jane Smith</h4>
                <div class="social-links">
                  <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                </div>

                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>

              </div>
            </div><!--/Blog Author Widget -->

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                @foreach($categories as $category)
                <li><a href="#">{{$category->name}} <span>({{$category->posts->count()}})</span></a></li>
                  
                @endforeach
               
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div><!-- End recent post item-->

              <div class="post-item">
                <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div><!-- End recent post item-->

              <div class="post-item">
                <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div><!-- End recent post item-->

              <div class="post-item">
                <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div><!-- End recent post item-->

              <div class="post-item">
                <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

  </main>
      
  @endif
        <!-- Page Title -->
        
      
</div>
