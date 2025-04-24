</div>
     
     </div>
     <script>
			function togglePassword() {
				const passwordInput = document.getElementById("password-input");
				const icon = document.getElementById("toggle-password-icon");

				if (passwordInput.type === "password") {
					passwordInput.type = "text";
					icon.classList.remove("fa-unlock");
					icon.classList.add("fa-lock-open");
				} else {
					passwordInput.type = "password";
					icon.classList.remove("fa-lock-open");
					icon.classList.add("fa-unlock");
				}
			}
		</script>
		<script>
			const bar = document.getElementById('countdown-bar');
			const alertBox = document.getElementById('success-alert');
			let width = 100; // phần trăm
			const interval = setInterval(() => {
				width -= 20; // giảm 20% mỗi giây => 5 giây hết
				if (width <= 0) {
					clearInterval(interval);
					alertBox.style.display = 'none';
				} else {
					bar.style.width = width + '%';
				}
			}, 1000);
		</script>


		<script>
			
			setTimeout(() => {
				const box = document.getElementById('status-box');
				if (box) {
					box.style.transition = 'opacity 0.5s ease';
					box.style.opacity = 0;
					setTimeout(() => box.remove(), 500); 
				}
			}, 5000);
		</script>
 <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
 <script src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js" defer></script>
   </body>
 </html>