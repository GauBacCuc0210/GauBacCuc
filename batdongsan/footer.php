<?php
global $urlThemeActive;

$setting = setting();
?>
    <div class="fixed bottom-[2rem] left-4 z-50 flex items-center bg-yellow-200 text-gray-900 px-4 py-2 rounded-full shadow-lg transform translate-x-0 transition-all duration-500 ease-out hover:scale-105 hover:shadow-xl">
      <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 mr-3 animate-pulse">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.72 11.72 0 003.66.59 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.66 1 1 0 01-.21 1.11l-2.2 2.2z"/>
        </svg>
      </div>
      <div class="text-base font-medium">
        <span class="font-semibold">HOTLINE </span> <?php echo @$setting['phone']; ?>
      </div>
    </div>
       <!-- Footer -->
       <div class="bg-[#FAF7F4] text-black font-plus overflow-hidden fade-in">
      <footer class="px-4 py-10 mx-auto md:py-20 sm:px-6 md:container xl:px-20">
        <div class="flex flex-col justify-between md:flex-row">
          <div class="mb-8 md:mb-0">
            <h2 class="flex items-center mb-4 text-lg font-bold">
            <img src="<?php echo $setting['image_logo'] ?>" alt="icon" class="h-[100px] w-[150px] mr-4" />
            </h2>
            <div class="flex mb-4 space-x-4">
              <a href="<?php echo @$setting['instagram']; ?>" target="_blank"
                ><img src="<?= $urlThemeActive ?>image/icons/instagram.svg" alt="icon"
              /></a>
              <a href="<?php echo @$setting['facebook']; ?>" target="_blank"
                ><img src="<?= $urlThemeActive ?>image/icons/facebook.svg" alt="icon"
              /></a>
              <a href="<?php echo @$setting['linkedin']; ?>" target="_blank"
                ><img src="<?= $urlThemeActive ?>image/icons/linkedin.svg" alt="icon"
              /></a>
              <a href="<?php echo @$setting['youtube']; ?>" target="_blank"
              ><img src="<?= $urlThemeActive ?>image/icons/youtube.svg" alt="icon" /></a>
            </div>
            <address class="mb-4 space-y-2 not-italic">
                <p><?php echo @$setting['address']; ?></p>
                <p><?php echo @$setting['phone']; ?></p>
            <p><a href="mailto:<?php echo @$setting['responsibilityemail']; ?>"><?php echo @$setting['responsibilityemail']; ?></a></p>
            </address>
            <p>© 2024 Minhtuanvinhomes. All rights reserved.</p>
          </div>
          <div class="flex flex-col md:w-[50%]">
            <div>
              <h3 class="mb-4 text-xl font-bold sm:text-3xl text-[#142A72]">
                Xây dựng giấc mơ, giải pháp bất động sản
              </h3>
            </div>
            <div class="flex flex-col justify-between sm:flex-row md:w-[70%]">
              <div>
                <ul class="space-y-4">
                  <li>
                    <a href="#" class="hover:underline">Trang chủ</a>
                  </li>
                  <li>
                    <a href="/posts" class="hover:underline">Về <?php echo $setting['text_logo'] ?></a>
                  </li>
                  <li>
                    <a href="/projects" class="hover:underline">Danh sách dự án</a>
                  </li>
                  <li><a href="/contact" class="hover:underline">Liên hệ</a></li>
                </ul>
              </div>
              <div>
                <ul class="mt-4 space-y-4 sm:mt-0">
                  <li>
                    <a href="#" class="hover:underline"
                      >Lợi ích của khách hàng</a
                    >
                  </li>
                  <li>
                    <a href="#" class="hover:underline">Văn phòng làm việc</a>
                  </li>
                  <li>
                    <a href="#" class="hover:underline">Dịch vụ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="<?= $urlThemeActive ?>bds/js/script.js"></script>
  </body>
</html>
