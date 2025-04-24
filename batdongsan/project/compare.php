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

    .setcolor, .setcolor a {
        color: #333 !important;
    }

    .set-backgroundcontact {
        background-color: #182c77;
    }

    .price-details-content table {
        width: 100%;
        border-collapse: collapse;
    }

    .price-details-content th, 
    .price-details-content td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .price-details-content th {
        background-color: #f2f2f2;
    }
    table {
        width: 100%;
        table-layout: fixed;
    }

    th, td {
        text-align: left;
        padding: 12px;
        word-wrap: break-word;
        border: 1px solid #ddd;
    }

    #propertyListContainer {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 20px;
}


</style>
<div class="h-[100px] bg-white"></div>
<div class="py-10 px-4 sm:px-6 md:container xl:px-20 bg-white text-black font-plus fade-in">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold mb-8 text-[#142A72]">
            So sánh bất động sản Vinhomes
        </h1>

        <div id="propertyListContainer" class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <?php
            if (!empty($compareData)) {
                foreach ($compareData as $index => $project) {
            ?>
                    <div id="property<?= $index + 1 ?>" class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg" data-position="<?= $index + 1 ?>" data-project-id="<?= $project['id'] ?>">
                        <div class="relative">
                            <img src="<?= $project['image'] ?>" alt="<?= $project['name'] ?>" class="h-48 w-full object-cover" onerror="this.src=''" />
                            <button class="remove-property absolute top-2 right-2 bg-white rounded-full p-1 text-gray-500 hover:text-gray-700" data-project-id="<?= $project['id'] ?>" data-position="<?= $index + 1 ?>">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="p-4">
                            <h5 class="text-lg font-semibold mb-2"><?= $project['name'] ?></h5>
                            <p class="text-xl font-bold text-[#FF5722] mb-2"><?= $project['price'] ?></p>
                            <a href="#" class="text-[#142A72] hover:underline change-property" data-bs-toggle="modal" data-bs-target="#realEstateModal" data-position="<?= $index + 1 ?>">Đổi bất động sản khác</a>
                        </div>
                    </div>
                <?php
                }
            }

            $emptySlots = 3 - (count($compareData ?? []));
            for ($i = 0; $i < $emptySlots; $i++) {
                ?>
                <div data-bs-toggle="modal" data-bs-target="#realEstateModal" data-position="<?= count($compareData) + $i + 1 ?>" class="border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center p-4 h-full min-h-[250px] hover:border-gray-400 cursor-pointer transition-all add-property-btn">
                    <div class="mb-3 text-gray-400">
                        <i class="fas fa-plus-circle text-5xl"></i>
                    </div>
                    <h5 class="text-lg font-medium text-gray-600">Chọn bất động sản</h5>
                </div>
            <?php } ?>
        </div>

        <div class="modal fade" id="realEstateModal" tabindex="-1" aria-labelledby="realEstateModalLabel" aria-hidden="true" data-position="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="realEstateModalLabel">
                            Chọn bất động sản để so sánh
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="searchBox" class="form-control mb-3" placeholder="Nhập tìm kiếm..." />
                        <ul class="list-group" id="propertyList">
                            <?php foreach ($allProjects as $project) { ?>
                                <li class="list-group-item project-item" data-project-id="<?= $project->id ?>">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $project->image ?>" alt="<?= $project->name ?>" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0"><?= $project->name ?></h6>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng Thông Tin Chi Tiết -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse" id="comparisonTable">
                    <thead>
                        <tr>
                            <th class="text-left p-4 bg-gray-50" style="width: 120px;">Thông tin chi tiết</th>
                            <td class="p-4 font-bold"></td>
                            <td class="p-4 font-bold"></td>
                            <td class="p-4 font-bold"></td> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-4 bg-gray-50">Địa chỉ</th>
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                        </tr>
                        <tr class="border-b">
                            <th class="text-left p-4 bg-gray-50">Loại mô hình</th>
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                            <td class="p-4"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Nút liên hệ tư vấn -->
        <div class="text-center mb-8">
            <a href="/contact" class="inline-block px-8 py-3 rounded-xl text-white transition duration-300 bg-gradient-to-r from-[#182c77] to-[#6274bb] hover:from-[#6274bb] hover:to-[#182c77] font-medium">
                Liên hệ tư vấn ngay
            </a>
        </div>
    </div>
</div>
<?php getFooter(); ?>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_RELOAD) {
            const url = new URL(window.location.href);
            const baseUrl = url.origin + url.pathname;
            window.history.replaceState({}, '', baseUrl);
        }
        loadPropertiesFromURL();
        // Xử lý chọn vị trí
        document.addEventListener("click", function(event) {
            let slot = event.target.closest(".add-property-btn, .change-property");
            if (slot) {
                let position = slot.getAttribute("data-position");
                let modal = document.getElementById("realEstateModal");
                modal.setAttribute("data-position", position);
            }
        });

        // Xử lý chọn bất động sản
        document.addEventListener("click", function(event) {
            let selectedItem = event.target.closest(".project-item");
            if (selectedItem) {
                let projectId = selectedItem.getAttribute("data-project-id");
                let position = document.getElementById("realEstateModal").getAttribute("data-position");

                addPropertyToComparison(projectId, position);

                let modalInstance = bootstrap.Modal.getInstance(document.getElementById("realEstateModal"));
                modalInstance.hide();
            }
        });

        // Cập nhật bảng so sánh
        function updateComparisonTables(properties) {
            const table = document.getElementById("comparisonTable");

            if (!table) {
                console.error("❌ Không tìm thấy bảng so sánh trong DOM!");
                return;
            }
            
            // Lấy hàng tiêu đề và các hàng cố định
            const headerRow = table.querySelector("thead tr");
            const tbody = table.querySelector("tbody");
            
            // Điều chỉnh số cột dựa trên số lượng dự án
            const propertyCount = properties.length;
            
            // Xóa tất cả các ô TD trong hàng tiêu đề
            while (headerRow.children.length > 1) {
                headerRow.removeChild(headerRow.lastChild);
            }
            
            // Thêm số lượng ô TD phù hợp vào hàng tiêu đề
            for (let i = 0; i < propertyCount; i++) {
                const td = document.createElement("td");
                td.className = "p-4 font-bold";
                headerRow.appendChild(td);
            }
            
            // Xóa tất cả các hàng trong tbody
            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
            
            // Tạo hàng địa chỉ
            const addressRow = document.createElement("tr");
            addressRow.className = "border-b";
            const addressHeader = document.createElement("th");
            addressHeader.className = "text-left p-4 bg-gray-50";
            addressHeader.textContent = "Địa chỉ";
            addressRow.appendChild(addressHeader);
            
            // Thêm các ô dữ liệu địa chỉ
            for (let i = 0; i < propertyCount; i++) {
                const td = document.createElement("td");
                td.className = "p-4";
                if (properties[i]) {
                    td.textContent = properties[i].address || '';
                }
                addressRow.appendChild(td);
            }
            tbody.appendChild(addressRow);
            
            // Tạo hàng loại mô hình
            const typeRow = document.createElement("tr");
            typeRow.className = "border-b";
            const typeHeader = document.createElement("th");
            typeHeader.className = "text-left p-4 bg-gray-50";
            typeHeader.textContent = "Loại mô hình";
            typeRow.appendChild(typeHeader);
            
            // Thêm các ô dữ liệu loại mô hình
            for (let i = 0; i < propertyCount; i++) {
                const td = document.createElement("td");
                td.className = "p-4";
                if (properties[i]) {
                    td.textContent = properties[i].apart_type || '';
                }
                typeRow.appendChild(td);
            }
            tbody.appendChild(typeRow);
            
            // Tạo một tập hợp tất cả các thuộc tính từ tất cả các dự án
            const allAttributes = new Set();
            const attributeNames = {};
            
            properties.forEach(property => {
                if (property && property.attributes && Array.isArray(property.attributes)) {
                    property.attributes.forEach(attr => {
                        allAttributes.add(attr.id_attribute);
                        attributeNames[attr.id_attribute] = attr.attribute_name;
                    });
                }
            });

            // Thêm các hàng thuộc tính động
            allAttributes.forEach(attrId => {
                const row = document.createElement("tr");
                row.className = "border-b";
                
                const th = document.createElement("th");
                th.className = "text-left p-4 bg-gray-50";
                th.textContent = attributeNames[attrId] || `Thuộc tính ${attrId}`;
                row.appendChild(th);
                
                // Thêm các ô dữ liệu cho mỗi dự án
                for (let i = 0; i < propertyCount; i++) {
                    const td = document.createElement("td");
                    td.className = "p-4";
                    
                    // Nếu có dự án ở vị trí này, hiển thị giá trị thuộc tính
                    if (properties[i] && properties[i].attributes) {
                        const attribute = properties[i].attributes.find(attr => attr.id_attribute == attrId);
                        if (attribute) {
                            td.textContent = attribute.description || '';
                        }
                    }
                    
                    row.appendChild(td);
                }
                
                tbody.appendChild(row);
            });
            
            // Cập nhật tên dự án trong hàng tiêu đề
            for (let i = 0; i < propertyCount; i++) {
                const property = properties[i];
                if (property && property.id) {
                    const headerCells = headerRow.querySelectorAll('td');
                    if (headerCells.length > i) {
                        headerCells[i].textContent = property.name || '';
                    }
                }
            }
        }

        // Cập nhật nội dung trong bảng
        function updateCellByRowAndColumn(row, columnIndex, value) {
            if (!row) return;

            const cells = row.querySelectorAll('td');
            if (cells.length >= columnIndex) {
                cells[columnIndex - 1].innerHTML = value || '';
            } else {
                console.warn(`⚠️ Không tìm thấy đủ ô trong hàng. Cần cột ${columnIndex}, nhưng chỉ có ${cells.length} ô:`, row);
            }
        }

        // Thêm bất động sản vào so sánh
        function addPropertyToComparison(projectId, position) {
            fetch(`/apis/getProjectDetailsAPI?id=${projectId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(project => {
                    if (!project || !project.id) {
                        console.error("❌ Không tìm thấy dữ liệu dự án hợp lệ");
                        return;
                    }

                    let propertySlot = document.querySelector(`[data-position='${position}']`);

                    if (!propertySlot) {
                        console.error(`❌ Không tìm thấy vị trí ${position} trong DOM!`);
                        return;
                    }

                    propertySlot.outerHTML = `
                        <div id="property${position}" class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg" data-position="${position}" data-project-id="${project.id}">
                            <div class="relative">
                                <img src="${project.image}" alt="${project.name}" class="h-48 w-full object-cover" onerror="this.src=''"/>
                                <button class="remove-property absolute top-2 right-2 bg-white rounded-full p-1 text-gray-500 hover:text-gray-700" data-project-id="${project.id}" data-position="${position}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="p-4">
                                <h5 class="text-lg font-semibold mb-2">${project.name}</h5>
                                <p class="text-xl font-bold text-[#FF5722] mb-2">${project.price || ''}</p>
                                <a href="#" class="text-[#142A72] hover:underline change-property" data-bs-toggle="modal" data-bs-target="#realEstateModal" data-position="${position}">Đổi bất động sản khác</a>
                            </div>
                        </div>
                    `;

                    addRemoveEvent();
                    
                    fetchPropertyDetails(project.id, position);
                    updateURLWithProperties();
                })
                .catch(error => console.error("❌ Lỗi khi lấy dữ liệu dự án:", error));
        }
        
        function fetchPropertyDetails(projectId, position) {
            fetch(`/apis/getProjectDetailsAPI?id=${projectId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(project => {
                    if (!project || !project.id) return;
                    
                    fetchAllSelectedProperties();
                })
                .catch(error => console.error(`❌ Lỗi khi lấy chi tiết dự án ID ${projectId}:`, error));
        }

        // Lấy tất cả các bất động sản đã chọn
        function fetchAllSelectedProperties() {
            const propertyElements = document.querySelectorAll("[id^='property']");
            const propertyIds = [];

            propertyElements.forEach(element => {
                const projectId = element.getAttribute("data-project-id");
                if (projectId) {
                    propertyIds.push(projectId);
                }
            });

            if (propertyIds.length === 0) {
                updateComparisonTables([]);
                return;
            }

            Promise.all(
                propertyIds.map(id =>
                    fetch(`/apis/getProjectDetailsAPI?id=${id}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .catch(error => {
                        console.error(`❌ Lỗi khi lấy dữ liệu dự án ID ${id}:`, error);
                        return null;
                    })
                )
            )
            .then(properties => {
                const validProperties = properties.filter(p => p !== null);
                updateComparisonTables(validProperties);
            });
        }

        function addRemoveEvent() {
            document.querySelectorAll(".remove-property").forEach(button => {
                button.removeEventListener("click", removeProperty);
                button.addEventListener("click", removeProperty);
            });
        }

        // Xóa bất động sản
        function removeProperty(event) {
            event.preventDefault();
            event.stopPropagation();

            let projectId = this.getAttribute("data-project-id");
            let position = this.getAttribute("data-position");

            let propertySlot = document.getElementById(`property${position}`);
            if (propertySlot) {
                propertySlot.outerHTML = `
                    <div data-bs-toggle="modal" data-bs-target="#realEstateModal" data-position="${position}" class="border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center p-4 h-full min-h-[250px] hover:border-gray-400 cursor-pointer transition-all add-property-btn">
                        <div class="mb-3 text-gray-400">
                            <i class="fas fa-plus-circle text-5xl"></i>
                        </div>
                        <h5 class="text-lg font-medium text-gray-600">Chọn bất động sản</h5>
                    </div>
                `;
                
                setTimeout(fetchAllSelectedProperties, 100);
            }
            
            addRemoveEvent();
            updateURLWithProperties();
        }

        function updateURLWithProperties() {
            const propertyElements = document.querySelectorAll("[id^='property']");
            const url = new URL(window.location.href);
            
            for (let i = 1; i <= 4; i++) {
                url.searchParams.delete(`p${i}`);
            }

            let hasProperties = false;

            propertyElements.forEach(element => {
                const position = element.getAttribute("data-position");
                const projectId = element.getAttribute("data-project-id");
                if (projectId && position) {
                    url.searchParams.set(`p${position}`, projectId);
                    hasProperties = true;
                }
            });

            window.history.pushState({}, '', url.toString());

            if (hasProperties) {
                updateShareButton(url.toString());
            } else {
                const baseUrl = url.origin + url.pathname;
                updateShareButton(baseUrl);
                // const shareBtn = document.getElementById('shareComparisonBtn');
                // if (shareBtn) shareBtn.style.display = 'none';
            }
        }


        function updateShareButton(shareUrl) {
            let shareBtn = document.getElementById('shareComparisonBtn');

            if (!shareBtn) {
                const container = document.body;
                shareBtn = document.createElement('div');
                shareBtn.id = 'shareComparisonBtn';
                shareBtn.className = 'fixed bottom-4 right-4 bg-[#142A72] text-white rounded-full p-3 shadow-lg cursor-pointer hover:bg-opacity-90 transition-all flex items-center';
                shareBtn.innerHTML = `
                    <i class="fas fa-share-alt mr-2"></i>
                    <span>Chia sẻ so sánh</span>
                `;
                container.appendChild(shareBtn);
            }

            shareBtn.setAttribute('data-share-url', shareUrl);
            
            shareBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(shareUrl).then(() => {
                    alert('Đã sao chép liên kết so sánh vào clipboard!');
                }).catch(err => {
                    console.error('Không thể sao chép liên kết: ', err);
                    prompt('Sao chép liên kết này để chia sẻ:', shareUrl);
                });
            });
        }


        function loadPropertiesFromURL() {
            const url = new URL(window.location.href);
            const propertyParams = {};
            for (let i = 1; i <= 4; i++) {
                const paramName = `p${i}`;
                const value = url.searchParams.get(paramName);
                if (value) {
                    propertyParams[paramName] = value;
                }
            }
            
            let hasProperties = false;
            Object.keys(propertyParams).forEach(key => {
                const projectId = propertyParams[key];
                if (projectId) {
                    const position = key.substring(1);
                    setTimeout(() => {
                        addPropertyToComparison(projectId, position);
                    }, 300);
                    hasProperties = true;
                }
            });
                if (hasProperties) {
                setTimeout(() => {
                    updateShareButton(window.location.href);
                }, 1000);
            }
        }

        document.getElementById("searchBox").addEventListener("keyup", function() {
            const searchTerm = this.value.toLowerCase();
            const propertyItems = document.querySelectorAll("#propertyList .project-item");
            
            propertyItems.forEach(item => {
                const propertyName = item.querySelector("h6").textContent.toLowerCase();
                if (propertyName.includes(searchTerm)) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        });

        addRemoveEvent();
        setTimeout(fetchAllSelectedProperties, 500);
    });

    
</script>