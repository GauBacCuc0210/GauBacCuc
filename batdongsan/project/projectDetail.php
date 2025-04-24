<?php
global $settingThemes;
getHeader();
?>
<style>
  .background-header {
    background-image: none !important;
  }

  .nav-projectpage a {
    color: black !important;
  }

  .setcolor {
    color: #333 !important;
  }

  .setcolor a {
    color: #333 !important;
  }

  .set-backgroundcontact {
    background-color: #182c77;

  }

  .swiper-slide-active img {
    transform: scale(1.2);
    transition: transform 0.5s ease-in-out;
  }

  @media (max-width: 480px) {
    .swiper {
      width: 100%;
    }

    .swiper-slide img {
      transform: scale(3);
    }
  }

  .swiper-button-next,
  .swiper-button-prev {
    position: absolute;
    width: 50px;
    height: 50px;
    color: white;
    z-index: 10;
  }

  .swiper-button-next::before,
  .swiper-button-prev::before {
    content: "";
    position: absolute;
    inset: 0;
    background: black;
    opacity: 0.5;
    border-radius: 50%;
    z-index: -1;
  }

  .swiper-button-prev::after,
  .swiper-button-next::after {
    font-size: 14px;
    padding: 12px;
  }

  .list-tab-button .active {
    background: #00b3e3 !important;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  table th,
  table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }

  table th {
    background-color: #f4f4f4;
    font-weight: bold;
  }

  table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
  }

  table tbody tr:hover {
    background-color: #f1f1f1;
  }

  .overflow-x-auto {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }

  .commerce-description {
    display: inline;
  }
</style>
<?php
$allViews = [];

if (is_object($viewMain)) {
  $viewMain->view_type = 'main';
  $allViews[] = $viewMain;
}


if (!empty($view1)) {
  foreach ($view1 as $item) {
    $item->view_type = 'view1';
    $allViews[] = $item;
  }
}

if (!empty($view2)) {
  foreach ($view2 as $item) {
    $item->view_type = 'view2';
    $allViews[] = $item;
  }
}

if (!empty($view3)) {
  foreach ($view3 as $item) {
    $item->view_type = 'view3';
    $allViews[] = $item;
  }
}

if (!empty($view4)) {
  foreach ($view4 as $item) {
    $item->view_type = 'view4';
    $allViews[] = $item;
  }
}

if (!empty($view5)) {
  foreach ($view5 as $item) {
    $item->view_type = 'view5';
    $allViews[] = $item;
  }
}

if (!empty($view6)) {
  foreach ($view6 as $item) {
    $item->view_type = 'view6';
    $allViews[] = $item;
  }
}

if (!empty($view7)) {
  foreach ($view7 as $item) {
    $item->view_type = 'view7';
    $allViews[] = $item;
  }
}

if (!empty($view8)) {
  foreach ($view8 as $item) {
    $item->view_type = 'view8';
    $allViews[] = $item;
  }
}

usort($allViews, function ($a, $b) {
  return $a->main_view_id <=> $b->main_view_id;
});

foreach ($allViews as $item) {
  switch ($item->view_type) {
    case 'view1':
      ?>
        <div class="flex items-center justify-center text-white slide-left"
          style="background: linear-gradient(270deg, #236093 0%, #345574)">
          <div class="max-w-[88%] px-4 py-12">
            <h1 class="mb-8 text-2xl font-semibold text-center md:text-3xl">
              <?= htmlspecialchars_decode($item->main_title) ?>
            </h1>
            <div class="mb-12 text-sm">
              <?= htmlspecialchars_decode($item->main_description) ?>
            </div>
            <br><br>
            <div class="grid grid-cols-1 gap-8 text-sm md:grid-cols-3">
              <?php if (!empty($item->items)) : ?>
                <?php foreach ($item->items as $subitem) : ?>
                  <div class="">
                    <img src="<?= !empty($subitem->detail_image) ? htmlspecialchars($subitem->detail_image) : 'default.jpg' ?>"
                      alt="<?= htmlspecialchars_decode($subitem->title) ?>"
                      class="mx-auto mb-4 border-4 border-white" />
                    <span>
                      <h2 class="inline font-bold"><?= htmlspecialchars_decode($subitem->title) ?></h2> &nbsp;–
                      <div class="inline">
                        <?= $subitem->description ?>
                      </div>
                    </span>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="text-center">Không có dữ liệu hiển thị.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="w-full h-[1px] bg-gradient-to-r from-gray-100 via-gray-300 to-gray-100 my-5"></div>
      <?php
    break;

    case 'view2':
      ?>
        <div class="flex flex-col items-center justify-center slide-left">
          <div class="w-full px-4 mt-10 lg:max-w-[88%]">
            <h1 class="mb-8 text-2xl font-semibold text-center uppercase md:text-3xl">
              <?= htmlspecialchars_decode($item->main_title) ?>
            </h1>
            <div class="mb-12">
              <?= htmlspecialchars_decode($item->main_description) ?>
            </div>
          </div>
          <br>
          <?php if (!empty($item->items) && isset($item->items[0]) && !empty($item->main_image)) : ?>
            <img src="<?= $item->main_image ?>"
              alt="<?= htmlspecialchars_decode($item->main_title) ?>"
              class="w-full" />
          <?php endif; ?>
        </div>
      
        <div class="py-8 text-white fade-in" style="background: linear-gradient(270deg, #236093 0%, #345574 100%)">
          <?php if (!empty($item->items)) : ?>
            <div class="w-full mx-auto">
              <?php foreach ($item->items as $i => $detail) : ?>
                <div class="flex flex-col justify-center p-4 md:flex-row <?= ($detail->setting_view == 1) ? 'slide-right' : 'slide-left' ?>">
                  <?php if ($detail->setting_view == 1) : // Hiển thị ảnh bên trái ?>
                    <div class="flex items-center justify-center mt-8 md:mt-0 md:w-6/12 px-2">
                      <img src="<?= htmlspecialchars($detail->detail_image ?? 'default.jpg') ?>"
                        alt="<?= htmlspecialchars($detail->title ?? '') ?>"
                        class="object-cover border-8 border-gray-200 w-full max-w-[850px] h-[500px]" />
                    </div>
                    <div class="pt-6 md:w-4/12 px-2 md:pt-0">
                      <h1 class="mb-4 text-xl font-semibold text-center uppercase">
                        <?= htmlspecialchars_decode($detail->title ?? '') ?>
                      </h1>
                      <div class="leading-relaxed">
                        <?= $detail->description ?>
                      </div>
                    </div>
                  <?php else : // Hiển thị ảnh bên phải ?>
                    <div class="md:w-4/12 px-2">
                      <h1 class="mb-4 text-xl font-semibold text-center uppercase">
                        <?= htmlspecialchars_decode($detail->title ?? '') ?>
                      </h1>
                      <div class="leading-relaxed">
                        <?= $detail->description ?>
                      </div>
                    </div>
                    <div class="flex items-center justify-center mt-6 md:mt-0 md:w-6/12 px-2">
                      <img src="<?= htmlspecialchars($detail->detail_image ?? 'default.jpg') ?>"
                        alt="<?= htmlspecialchars($detail->title ?? '') ?>"
                        class="object-cover border-8 border-gray-200 w-full max-w-[850px] h-[500px]" />
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php
      break;

      case 'view3':
        ?>
          <div class="relative text-[#444444] slide-right">
            <?php if (!empty($item->main_image)) : ?>
              <img src="<?= $item->main_image ?>"
                alt="Aerial view of Vinhomes Global Gate"
                class="w-full h-[auto]" />
            <?php endif; ?>
      
            <?php
              $positionClass = (isset($item->setting_view) && $item->setting_view == 2) ? 'left-auto right-[22%]' : 'left-[-38%]';
            ?>
      
            <div class="absolute inset-0 items-center justify-center <?= $positionClass ?> hidden md:flex">
              <div class="max-w-lg p-8 bg-white shadow-lg">
                <h1 class="mb-4 text-3xl font-semibold text-center">
                  <?= htmlspecialchars_decode($item->main_title) ?>
                </h1>
                <div class="mb-4 text-sm">
                  <?= htmlspecialchars_decode($item->main_description) ?>
                </div>
              </div>
            </div>
      
            <div class="flex items-center justify-center md:hidden">
              <div class="max-w-lg p-8 bg-white">
                <h1 class="mb-4 text-3xl font-semibold text-center">
                  <?= htmlspecialchars_decode($item->main_title) ?>
                </h1>
                <div class="mb-4 text-sm">
                  <?= htmlspecialchars_decode($item->main_description) ?>
                </div>
              </div>
            </div>
          </div>
        <?php
      break; 

      case 'view4':
        ?>
          <div class="w-full" style="background: linear-gradient(270deg, #236093 0%, #345574 100%)">
            <div class="w-[86%] mx-auto flex flex-col items-center justify-center p-8 md:flex-row slide-left">
              
              <?php if ($item->setting_view == 1) : ?>
                <div class="flex items-center justify-center md:w-1/2 lg:w-7/12 xl:w-3/5 md:mr-8">
                  <?php if (!empty($item->main_image)) : ?>
                    <img src="<?= $item->main_image ?>"
                      alt="<?= htmlspecialchars_decode($item->main_title) ?>"
                      class="object-cover border-8 border-white rounded-lg w-full h-[500px] md:h-[400px] lg:h-[500px] xl:h-[600px]" />
                  <?php else : ?>
                    <img src="default.jpg"
                      alt="Default Image"
                      class="object-cover border-8 border-white rounded-lg w-full h-[500px] md:h-[400px] lg:h-[500px] xl:h-[600px]" />
                  <?php endif; ?>
                </div>
        
                <div class="max-w-full p-8 mt-8 text-white border border-white md:mt-0 md:w-1/2 lg:w-5/12 xl:w-2/5">
                  <h1 class="px-4 md:px-8 lg:px-12 mb-4 text-xl font-bold text-center">
                    <?= isset($item->main_title) ? htmlspecialchars_decode($item->main_title) : '' ?>
                  </h1>
                  <?php if (!empty($item->main_description)) : ?>
                    <ul class="pl-2 space-y-2">
                      <?= htmlspecialchars_decode($item->main_description) ?>
                    </ul>
                  <?php endif; ?>
                </div>
              
              <?php else : ?>
                <div class="max-w-full p-8 text-white border border-white md:w-1/2 lg:w-5/12 xl:w-2/5">
                  <h1 class="px-4 md:px-8 lg:px-12 mb-4 text-xl font-bold text-center">
                    <?= isset($item->main_title) ? htmlspecialchars_decode($item->main_title) : '' ?>
                  </h1>
                  <?php if (!empty($item->main_description)) : ?>
                    <ul class="pl-2 space-y-2">
                      <?= htmlspecialchars_decode($item->main_description) ?>
                    </ul>
                  <?php endif; ?>
                </div>
        
                <div class="flex items-center justify-center mt-8 md:mt-0 md:ml-8 md:w-1/2 lg:w-7/12 xl:w-3/5">
                  <?php if (!empty($item->main_image)) : ?>
                    <img src="<?= $item->main_image ?>"
                      alt="<?= htmlspecialchars_decode($item->main_title) ?>"
                      class="object-cover border-8 border-white rounded-full w-[300px] h-[300px] md:w-[350px] md:h-[350px] lg:w-[400px] lg:h-[400px] xl:w-[500px] xl:h-[500px]" />
                  <?php else : ?>
                    <img src="default.jpg"
                      alt="Default Image"
                      class="object-cover border-8 border-white rounded-full w-[300px] h-[300px] md:w-[350px] md:h-[350px] lg:w-[400px] lg:h-[400px] xl:w-[500px] xl:h-[500px]" />
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              
            </div>
          </div>
        <?php
        break;

    case 'main':
      ?>
        <?php if (!empty($item->is_overview)): ?>
          <div class="flex flex-col items-center justify-evenly p-8 md:flex-row slide-right">
          <div class="md:w-[45%] lg:w-[50%] ml-[40px]">
  <!-- Ảnh lớn hiển thị với tỷ lệ 19:6 -->
  <div class="image-container w-[100%] overflow-hidden mb-[19px]">
    <img
      id="mainImage"
      src="<?= !empty($project['images'][1]) ? $project['images'][1] : 'default.jpg' ?>"
      alt="Main Image"
      class="w-full h-full object-cover p-2 mb-4 transition-all duration-300 border md:mb-0" />
  </div>

  <!-- Danh sách ảnh nhỏ -->
  <div class="grid grid-cols-4 gap-2">
    <?php
    if (!empty($project['images']) && is_array($project['images'])) {
      $maxImages = 7;
      $count = 0;

      for ($i = 1; $i <= $maxImages + 1; $i++) {
        if (empty($project['images'][$i])) continue;
        $count++;
    ?>

        <div class="relative group aspect-[16/9]">
          <img
            src="<?= $project['images'][$i] ?>"
            data-src="<?= $project['images'][$i] ?>"
            alt="Thumbnail <?= $i ?>"
            class="w-full h-full object-cover transition-all duration-300 border cursor-pointer hover:opacity-80"
            onmouseover="changeImage(this)" />
            <div class="tooltip-container hidden">
              <span
                class="absolute px-3 py-1 text-[10px] text-white transition-opacity duration-300 -translate-x-1/2 bg-black rounded left-1/2 bottom-[110%] ">
                <?= $project['title_image'][$i] ?>
              </span>
              <span
                class="absolute w-0 h-0 mb-1 transition-opacity duration-300 -translate-x-1/2 border-t-4 border-l-4 border-r-4 border-transparent left-1/2 bottom-full border-t-black"></span>
            </div>
        </div>
    <?php
      }
    } ?>
  </div>
</div>

            <div class="md:w-[45%] lg:w-[33%] md:pl-10 pt-10 md:pt-0">
              <h1 class="mb-4 text-2xl font-semibold text-center">
                TỔNG QUAN DỰ ÁN <?= $project['name'] ?>
              </h1>
              <div class="space-y-2 text-sm">
                <?= $project->main_content ?>
                </div>
            </div>
          </div>
        <?php endif; ?>
      <?php
    break;

    case 'view5':
      ?>
        <div class="flex items-center justify-center text-white slide-left"
          style="background: linear-gradient(270deg, #236093 0%, #345574)">
          <div class="max-w-[88%] p-8">
            <h1 class="mb-4 text-2xl font-semibold text-center">
              <?= htmlspecialchars_decode($item->main_title) ?>
            </h1>
            <div>
              <?= nl2br(htmlspecialchars_decode($item->main_description)) ?>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-center border-b fade-in">
          <?= $project['map'] ?>
        </div>
        <div class="flex items-center justify-center border-b fade-in">
          <img
            src=" <?= htmlspecialchars_decode($item->main_image) ?>"
            alt=""
            class="w-[100%]" />
        </div>

        <div class="flex flex-col items-center justify-center mt-8 slide-right">
          <h1 class="mb-8 text-2xl font-semibold text-center">
            Mặt bằng tổng thể <?= $project['name'] ?>
          </h1>
          <img
            src="<?= $project['images']['img_premises'] ?>"
            alt=""
            class="w-[100%]" />
        </div>
      <?php
    break;

    case 'view6':
      ?>
        <div class="h-[100px] bg-white"></div>
        <div class="py-12 text-black bg-white">
          <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between max-w-7xl mx-auto fade-in">
              <?php if ($item->setting_view == 1) : ?>
                <div class="md:w-4/12 flex justify-center md:mr-24">
                  <?php if (!empty($item->main_image)) : ?>
                    <div class="rounded-[165px] overflow-hidden border-8 border-gray-200 min-w-[700px] h-[450px]">
                      <img src="<?= $item->main_image ?>"
                        alt="<?= htmlspecialchars_decode($item->main_title) ?>"
                        class="object-cover w-full h-full" />
                    </div>
                  <?php else : ?>
                    <div class="rounded-[165px] overflow-hidden border-8 border-gray-200 min-w-[700px] h-[450px]">
                      <img src="./image/detail/vinhomes-global-gate-banner.jpg"
                        alt="Aerial view of Vinhomes Global Gate with buildings, roads, and water bodies"
                        class="object-cover w-full h-full" />
                    </div>
                  <?php endif; ?>
                </div>
                
                <div class="md:w-5/12 p-8 mt-16 md:mt-0 md:ml-24">
                  <h1 class="mb-6 text-2xl font-semibold text-left uppercase">
                    <?= htmlspecialchars_decode($item->main_title) ?>
                  </h1>
                  <div class="text-base leading-relaxed">
                    <?= htmlspecialchars_decode($item->main_description) ?>
                  </div>
                </div>
              
              <?php else : ?>
                <div class="md:w-5/12 p-8 md:mr-24">
                  <h1 class="mb-6 text-2xl font-semibold text-left uppercase">
                    <?= htmlspecialchars_decode($item->main_title) ?>
                  </h1>
                  <div class="text-base leading-relaxed">
                    <?= htmlspecialchars_decode($item->main_description) ?>
                  </div>
                </div>
                
                <div class="md:w-4/12 flex justify-center mt-16 md:mt-0 md:ml-24">
                  <?php if (!empty($item->main_image)) : ?>
                    <div class="rounded-[50%] overflow-hidden border-8 border-gray-200 w-[450px] h-[300px]">
                      <img src="<?= $item->main_image ?>"
                        alt="<?= htmlspecialchars_decode($item->main_title) ?>"
                        class="object-cover w-full h-full" />
                    </div>
                  <?php else : ?>
                    <div class="rounded-[50%] overflow-hidden border-8 border-gray-200 w-[450px] h-[300px]">
                      <img src="./image/detail/vinhomes-global-gate-banner.jpg"
                        alt="Aerial view of Vinhomes Global Gate with buildings, roads, and water bodies"
                        class="object-cover w-full h-full" />
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php
    break;

    case 'view7':
      ?>
        <div class="flex items-center justify-center text-white slide-right"
     style="background: linear-gradient(270deg, #236093 0%, #345574)">
  <div class="w-full px-4 py-12 lg:max-w-[88%]">
    <h1 class="mb-8 text-2xl font-semibold text-center uppercase md:text-3xl">
      <?= htmlspecialchars_decode($item->main_title) ?>
    </h1>
    <div class="mb-12 text-sm">
      <?= htmlspecialchars_decode($item->main_description) ?>
    </div>

    <?php if (!empty($project['images']) && is_array($project['images'])) { ?>
      <div class="swiper w-[90%] lg:max-w-[88%] h-[230px] md:h-[400px] xl:h-[500px] relative mx-auto">
        <div class="swiper-wrapper">
          <?php
          $maxImages = 8;
          for ($i = 1; $i <= $maxImages + 1; $i++) {
            if (empty($project['images'][$i])) continue;
          ?>
            <div class="flex items-center justify-center swiper-slide">
              <img
                src="<?= strip_tags($project['images'][$i]) ?>"
                alt="Ảnh <?= $i ?>"
                class="rounded-lg shadow-lg w-full h-[90%] object-cover cursor-pointer popup-image"
                data-src="<?= strip_tags($project['images'][$i]) ?>"
              />
            </div>
          <?php } ?>
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    <?php } ?>
  </div>
</div>

       <!-- Modal popup ảnh -->
       <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50">
  <span id="closeModal" class="absolute top-4 right-6 text-white text-3xl cursor-pointer">&times;</span>

  <!-- Nút chuyển ảnh -->
  <button id="prevImage" class="absolute left-6 text-white text-3xl cursor-pointer z-50">&lt;</button>

  <!-- Ảnh và caption -->
  <div class="relative flex flex-col items-center justify-center max-w-full max-h-full">
    <img id="modalImage" src="" class="rounded-t-lg shadow-xl max-h-[80vh] w-auto h-auto object-contain transition-all duration-300 scale-100" />
    <div class="w-full bg-black/80 py-3 px-4 rounded-b-lg">
      <p id="imageCaption" class="text-white text-lg md:text-xl text-center"></p>
    </div>
  </div>

  <button id="nextImage" class="absolute right-6 text-white text-3xl cursor-pointer z-50">&gt;</button>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const images = Array.from(document.querySelectorAll('.popup-image'));
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const imageCaption = document.getElementById('imageCaption');
    let currentIndex = 0;
    
    // Lưu trữ tiêu đề ảnh
    const imageTitles = <?= json_encode(isset($project['title_image']) ? $project['title_image'] : []) ?>;

    function showImage(index) {
      if (index < 0) index = images.length - 1;
      if (index >= images.length) index = 0;
      
      const img = images[index];
      modalImage.src = img.getAttribute('data-src');
      
      // Lấy index thực của ảnh từ alt text (Ảnh X)
      const altText = img.getAttribute('alt');
      const imgIndex = altText.replace('Ảnh ', '');
      
      // Cập nhật caption
      imageCaption.textContent = imageTitles[imgIndex] || 'Ảnh ' + imgIndex;
      
      currentIndex = index;
    }

    images.forEach((img, index) => {
      img.addEventListener('click', function () {
        showImage(index);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      });
    });

    document.getElementById('closeModal').addEventListener('click', function () {
      modal.classList.remove('flex');
      modal.classList.add('hidden');
    });

    document.getElementById('imageModal').addEventListener('click', function (e) {
      if (e.target === this) {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
      }
    });

    document.getElementById('prevImage').addEventListener('click', function (e) {
      e.stopPropagation();
      showImage(currentIndex - 1);
    });

    document.getElementById('nextImage').addEventListener('click', function (e) {
      e.stopPropagation();
      showImage(currentIndex + 1);
    });
  });
</script>
      <?php
      break;
    

    case 'view8':
      ?>
        <div class="px-4 md:px-[100px] lg:px-[200px] xl:px-[250px] py-10 text-[#444444] slide-right">
          <h1 class="mb-4 text-2xl font-semibold text-center uppercase">
            <?= htmlspecialchars_decode($item->main_title) ?>
          </h1>

          <?php if (!empty($item->main_description)) : ?>
            <div class="overflow-x-auto">
              <?= htmlspecialchars_decode($item->main_description) ?>
            </div>
          <?php else : ?>
            <div class="text-center text-gray-500">Thông tin giá bán chưa cập nhật</div>
          <?php endif; ?>
        </div>
      <?php
    break;
  }
}
?>
<div
  class="relative min-h-[400px] bg-center bg-cover py-10 fade-in"
  style="
        background-image: url('<?= $project['image'] ?>');
      ">
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div
    class="relative z-10 flex flex-col items-center justify-center px-4 min-h-[400px]">
    <h1 class="mb-6 text-2xl font-bold text-white">
      ĐĂNG KÝ TƯ VẤN CHUYÊN SÂU DỰ ÁN
    </h1>
    <div>
      <form method="post" action="/contact" class="w-full max-w-4xl">
        <div class="flex flex-wrap mb-4 -mx-2">
          <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
            <input
              class="w-full p-2 border border-gray-300 rounded"
              type="text" name="name" required
              placeholder="Họ và tên*" />
          </div>
          <input type="hidden" value="<?php echo $csrfToken; ?>" name="_csrfToken">
          <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
            <input
              class="w-full p-2 border border-gray-300 rounded"
              type="text" name="phone" required
              placeholder="Số điện thoại*" />
          </div>
          <div class="w-full px-2 mb-4 md:w-1/4 md:mb-0">
            <input
              class="w-full p-2 border border-gray-300 rounded"
              type="email" name="email" required
              placeholder="Email" />
          </div>
          <div class="w-full px-2 md:w-1/4">
            <input
              class="w-full p-2 border border-gray-300 rounded"
              type="text" name="subject"
              placeholder="Dự án quan tâm" />
          </div>
        </div>
        <div class="mb-4">
          <textarea
            class="w-full p-2 border border-gray-300 rounded"
            rows="6" name="content" required
            placeholder="Nhu cầu quan tâm"></textarea>
        </div>
        <button class="px-6 py-2 text-white bg-[#345574] rounded">
          ĐĂNG KÝ
        </button>
      </form>
    </div>
  </div>
</div>

<?php getFooter(); ?>

<script src="./script.js"></script>
<script>
 document.addEventListener("DOMContentLoaded", function () {
  // Change Main Image
  window.changeImage = function (element) {
    document.getElementById("mainImage").src = element.getAttribute("data-src");
  };

  // Initialize Swiper
  let swiperConfig = {
    effect: window.innerWidth < 768 ? "slide" : "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    coverflowEffect: {
      rotate: 0,
      stretch: 100,
      depth: 300,
      modifier: 1,
      slideShadows: false,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      480: { slidesPerView: 1.5 },
    },
  };

  let swiper = new Swiper(".swiper", swiperConfig);

  window.addEventListener("resize", function () {
    let newEffect = window.innerWidth < 768 ? "slide" : "coverflow";
    if (swiper.params.effect !== newEffect) {
      swiper.destroy(true, true);
      swiperConfig.effect = newEffect;
      swiper = new Swiper(".swiper", swiperConfig);
    }
  });

  // Tab Switching for Images
  const buttons = document.querySelectorAll(".tab-button");
  const image = document.getElementById("display-image");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      buttons.forEach((btn) => btn.classList.remove("bg-[#00b3e3]", "active"));
      button.classList.add("bg-[#00b3e3]", "active");
      image.src = button.getAttribute("data-img");
    });
  });

  // Tab Switching for Payment Tables
  const tabs = document.querySelectorAll(".tab-item");
  const tables = document.querySelectorAll(".payment-table");

  function activateTab(index) {
    tabs.forEach((tab, i) => {
      tab.classList.toggle("active", i === index);
      tab.querySelector(".arrow-icon").classList.toggle("hidden", i !== index);
    });

    tables.forEach((table, i) => {
      table.classList.toggle("hidden", i !== index);
    });
  }

  tabs.forEach((tab, index) => {
    tab.addEventListener("click", function () {
      activateTab(index);
    });
  });

  activateTab(0);

  const thumbnailContainers = document.querySelectorAll('.relative.group.aspect-\\[16\\/9\\]');
  
  thumbnailContainers.forEach(container => {
    const img = container.querySelector('img');
    const tooltipContainer = container.querySelector('.tooltip-container');
    
    if (img && tooltipContainer) {
      img.addEventListener('mouseenter', function() {
        tooltipContainer.classList.remove('hidden');
      });
      
      img.addEventListener('mouseleave', function() {
        tooltipContainer.classList.add('hidden');
      });
    }
  });
});

</script>