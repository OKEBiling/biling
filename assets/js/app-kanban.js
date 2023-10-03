"use strict";

(async function() {
	const kanbanWrapper = document.querySelector(".kanban-wrapper");
	const assetsPath = document.querySelector("html").getAttribute("data-assets-path");

	let response = await fetch("https://biling.oke.net.id/customer/task/json");

	function formatSelect2Option(option) {
		return option.id ? `<div class='badge ${$(option.element).data("color")} rounded-pill'>${option.text}</div>` : option.text;
	}

	function createDropdownMenu() {
		return `<div class='dropdown kanban-tasks-item-dropdown'>
                    <i class='dropdown-toggle bx bx-dots-vertical-rounded' id='kanban-tasks-item-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i>
                    <div class='dropdown-menu dropdown-menu-end' aria-labelledby='kanban-tasks-item-dropdown'>
                        <a class='dropdown-item' href='javascript:void(0)'>Copy task link</a>
                        <a class='dropdown-item' href='javascript:void(0)'>Duplicate task</a>
                        <a class='dropdown-item delete-task' href='javascript:void(0)'>Delete</a>
                    </div>
                </div>`;
	}

	function capitalizeFirstLetter(string) {
		return string[0].toUpperCase() + string.slice(1);
	}

	function createAvatars(avatars, isPullUp, avatarSize, delimiter, tooltipData) {
		const pullUpClass = isPullUp ? " pull-up" : "";
		const avatarClass = avatarSize ? `avatar-${avatarSize}` : "";
		const tooltips = (tooltipData && tooltipData.split(",")) || [];

		return avatars ? avatars.split(",").map((avatar, index, array) => {
			const marginRight = delimiter && index !== array.length - 1 ? ` me-${delimiter}` : "";
			const tooltip = tooltips[index] ? ` title='${tooltips[index]}'` : "";
			return `<div class='avatar ${avatarClass}${marginRight}' data-bs-toggle='tooltip' data-bs-placement='top'${tooltip}>
                        <img src='${assetsPath}img/avatars/${avatar}' alt='Avatar' class='rounded-circle${pullUpClass}'>
                    </div>`;
		}).join(" ") : " ";
	}

	if (!response.ok) {
		console.error("error", response);
		return;
	}

	response = await response.json();

	const jKanbanConfig = {
		element: ".kanban-wrapper",
		gutter: "5px",
		responsivePercentage: false,
		widthBoard: "350px",
		dragItems: true,
		boards: response,
		dragBoards: false,
		addItemButton: false,
		click: function(element) {},
		buttonClick: function(element, boardId) {}
	};

	const kanban = new jKanban(jKanbanConfig);
	const kanbanContainer = document.querySelector(".kanban-container");
	const kanbanTitleBoards = Array.from(document.querySelectorAll(".kanban-title-board"));
	const kanbanItems = Array.from(document.querySelectorAll(".kanban-item"));

	if (kanbanItems) {
		kanbanItems.forEach(function(item) {

			const title = `<span class='kanban-text'>${item.textContent}</span>`;
			const name = capitalizeFirstLetter(item.textContent);
			item.innerText = "";
			let imageTag = "";
			let badgeTag = "";
			let commentsTag = "";
			let attachmentsTag = "";
			let WhatsAppTag = "";
			if (item.getAttribute("data-image") !== null) {
				imageTag = `<img class='img-fluid rounded mb-2' src='${assetsPath}img/elements/${item.getAttribute("data-image")}'>`;
			}
			const attachments = item.getAttribute("data-attachments");
			if (attachments !== null) {
				attachmentsTag = `<span class='d-flex align-items-center me-2'><i class='bx bx-paperclip me-1'></i><span class='attachments'>${attachments}</span></span>`;
			}
			const comments = item.getAttribute("data-comments");
			if (comments !== null) {
				commentsTag = `<span class='d-flex align-items-center ms-1'><i class='bx bx-chat me-1'></i><span> ${comments} </span></span>`;
			}

			const badgeColor = item.getAttribute("data-badge");
			const startdate = item.getAttribute("data-start-date");
			const badgeText = item.getAttribute("data-badge-text");
			const assigned = item.getAttribute("data-assigned");
			const members = item.getAttribute("data-members");
			const latlng = item.getAttribute("data-lat-lng");
			const WhatsApp = item.getAttribute("data-phone-number");
			
			WhatsAppTag = `<span class='d-flex align-items-center ms-1'><a href="https://oke.net.id" target="_blank"> 
            <span class='d-flex align-items-center ms-1'><img src="/assets/img/icons/brands/WhatsApp.png" class="d-block w-px-20 h-auto rounded me-2"></span>
            </a></span> `;
            
            
            
			const assignedAvatars = createAvatars(assigned, true, "xs", null, members);
			const additionalInfoTag = `
			
                                    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header  bg-label-dark" style="height: 33px;">
                                    <img src="/assets/img/avatars/1.png" class="d-block w-px-20 h-auto rounded me-2" alt="">
                                    <div class="me-auto fw-semibold">${name}</div> <small>${badgeText}</small>
                            
                                </div>
                                <div class="toast-body">
                                    <div class='d-flex justify-content-between align-items-center flex-wrap mt-2 pt-1'>
                                        <div class='d-flex'>${WhatsAppTag} ${attachmentsTag} ${commentsTag}</div>
                                        <div class='avatar-group d-flex align-items-center assigned-avatar'>${assignedAvatars}</div>
                                    </div>
                                </div>
                            </div>
              `;
			item.insertAdjacentHTML("beforeend", additionalInfoTag);
		});
	}
})();