<?php header("Content-type: text/html;charset=utf-8"); ?>
<html lang="ru">
    <title><?php echo $title?></title>

<head>
    <link rel="stylesheet" href="/html/styles.css" />
    <script src="/scripts/PageAppearing.js"></script>
    <script src="/scripts/MoreTopics.js"></script>
    <script src="/scripts/DragNDropImage.js"></script>
    <script>
        function like(event) {
            let element = event.target;

            if (element.className !== "like-button") {
                element = element.parentElement;
            }

            isLiked = element.getAttribute("like") === "true";
            element.setAttribute("like", !isLiked);
            let spanWithCount = element.children.item(1);
            let count = Number(spanWithCount.innerText);
            isLiked ? count-- : count++;
            spanWithCount.innerHTML = count;
        }
    </script>
    <script>
        function showProfileMenu() {
            document
                .getElementsByClassName("account-menu")
                .item(0)
                .classList.toggle("show");
        }

        window.onclick = function(e) {
            if (!e.target.matches(".account-menu-button")) {
                var accountMenu = document
                    .getElementsByClassName("account-menu")
                    .item(0);
                if (accountMenu.classList.contains("show")) {
                    accountMenu.classList.remove("show");
                }
            }
        };
    </script>
    <script>
        function onCoverImageMouseOver() {
            let img = document.getElementById("profile-cover-image");
            img.style = "opacity: 0.5; transition: 250ms;";
            let element = document
                .getElementsByClassName("profile-cover")
                .item(0);
            element.style = "position: relative;";

            let span = document.createElement("span");
            span.id = "drag-n-drop-text";
            span.textContent =
                "Перетащите изображение сюда, чтобы изменить его";
            let left = element.offsetWidth / 6;
            let top = element.offsetHeight / 2.5;
            span.style = `position: absolute; left: ${left}px; top: ${top}px; z-index: 2;`;
            element.appendChild(span);
        }

        function onConverImageMouseOut() {
            let img = document.getElementById("profile-cover-image");
            img.style = "opacity: 1; transition: 250ms";
            let element = document
                .getElementsByClassName("profile-cover")
                .item(0);
            let span = document.getElementById("drag-n-drop-text");
            element.removeChild(span);
        }
    </script>
</head>

<body style="opacity: 0;">