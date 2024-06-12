function showMore() {
    let topics = [
        "Аниме", "Инди", "Скриншоты",
        "Soulslike", "Арт", "Скидки",
        "DOTA", "Фото", "Minecraft",
        "Жизнь", "Почитать", "Dragon Age"
    ];
    let topicsList = document.getElementById("topics-list");
    let moreTopicsButton = document.getElementById("more-topics");

    for (let i = 0; i < topics.length; i++) {
        let newTopic = createTopic(topics[i]);
        topicsList.insertBefore(newTopic, moreTopicsButton);
    }

    moreTopicsButton.style = "display: none;";
}

function createTopic(textContent) {
    let a = document.createElement("a");
    a.href = "/popular.html";

    let li = document.createElement("li");
    li.className = "side-menu-item";

    let div = document.createElement("div");
    div.className = "image";

    let img = document.createElement("img");
    img.className = "icon";
    img.src = "icons/side-menu/menu/my-list-icon.svg";

    let span = document.createElement("span");
    span.className = "side-menu-item-text";
    span.textContent = textContent;

    div.appendChild(img);
    li.appendChild(div);
    li.appendChild(span);
    a.appendChild(li);
    return a;
}