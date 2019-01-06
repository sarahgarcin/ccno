<?php $jgm = $site->find('jeunes-gens-modernes'); ?>

<div class="player-container">

  <audio id="audio" preload="none" tabindex="0">
    <?php foreach($jgm->audio() as $audio):?>
		  <source src="<?= $audio->url() ?>" data-track-number="1" />
    <?php endforeach ?>
		Your browser does not support HTML5 audio.
   </audio>

  <div class="player">

    <div class="large-toggle-btn">
      <i class="large-play-btn"><span class="screen-reader-text">Large toggle button</span></i>
    </div>
    <!-- /.play-box -->

    <div class="info-box">
      <div class="track-info-box">
        <!-- <div class="track-title-text"></div> -->
        <div class="audio-time">
          <span class="current-time">00:00</span> /
          <span class="duration">00:00</span>
        </div>
      </div>
      <!-- /.info-box -->

      <div class="progress-box">
        <div class="progress-cell">
          <div class="progress">
            <div class="progress-buffer"></div>
            <div class="progress-indicator"></div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.progress-box -->

<!--     <div class="controls-box">
      <i class="previous-track-btn disabled"><span class="screen-reader-text">Previous track button</span></i>
      <i class="next-track-btn"><span class="screen-reader-text">Next track button</span></i>
    </div> -->
    <!-- /.controls-box -->

  </div>
  <!-- /.player -->

  <div class="play-list">

    <div class="play-list-row" data-track-row="1">
      <div class="small-toggle-btn">
        <i class="small-play-btn"><span class="screen-reader-text">Small toggle button</span></i>
      </div>
      <div class="track-number">
        <!-- 1. -->
      </div>
      <div class="track-title">
        <a class="playlist-track" href="#" data-play-track="1"><?= $jgm->audio()->first()->name() ?></a>
      </div>
    </div>
    <?php $index = 0; ?>
    <?php foreach($jgm->audio() as $audio):?>
      <?php $index ++; ?>
      <?php if($index != 1):?>
        <div class="play-list-row" data-track-row="<?php echo $index?>">
          <div class="small-toggle-btn">
            <i class="small-play-btn"><span class="screen-reader-text">Small toggle button</span></i>
          </div>
          <div class="track-number">
            <!-- <?php //echo $index?>. -->
          </div>
          <div class="track-title">
            <a class="playlist-track" href="#" data-play-track="<?php echo $index?>">
              <?php echo $audio->name()?>
            </a>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach ?>
  </div>
</div>







