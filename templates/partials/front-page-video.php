<section id="banner" class="major" style="background-image: url(<?= sprintf( 'https://img.youtube.com/vi/%s/maxresdefault.jpg', carbon_get_the_post_meta('video')) ?>);">
  <div class="video-background">
    <div class="video-foreground">
      <span id="video-iframe"></span>
    </div>
  </div>
  <div class="inner">
      <div class="row">
        <header class="major col-md-6">
          <div class="box">
            <h1><?= the_title(); ?></h1>
          </div>
        </header>
        <div class="content col-md-6">
          <p><?= carbon_get_the_post_meta('video-caption') ?></p>
          <ul class="actions">
            <li>
              <button id="toggle-full-video" class="button" aria-label="View Full Screen Video">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
</section>