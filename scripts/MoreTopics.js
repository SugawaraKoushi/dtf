function showMore() {
    let topics = [
        "Аниме", "Инди", "Скриншоты",
        "Soulslike", "Арт", "Скидки",
        "DOTA", "Фото", "Minecraft",
        "Жизнь", "Почитать", "Dragon Age"
    ];
    let icons = [
        "anime-icon.webp", "indi-icon.png", "screenshots-icon.jpeg",
        "soulslike-icon.jpeg", "art2-icon.webp", "sales-icon.webp",
        "dota-icon.webp", "photo-icon.webp", "minecraft-icon.webp",
        "life-icon.webp", "reading-icon.webp", "dragon-age-icon.webp"
    ];

    let topicsList = document.getElementById("topics-list");
    let moreTopicsButton = document.getElementById("more-topics");

    for (let i = 0; i < topics.length; i++) {
        let newTopic = createTopic(topics[i], icons[i]);
        topicsList.insertBefore(newTopic, moreTopicsButton);
    }

    moreTopicsButton.style = "display: none;";
}

function createTopic(textContent, icon) {
    let a = document.createElement("a");
    a.href = "./Popular.php";

    let li = document.createElement("li");
    li.className = "side-menu-item";

    let div = document.createElement("div");
    div.className = "image";

    let img = document.createElement("img");
    img.className = "icon";
    img.src = `/icons/side-menu/topics/${icon}`;

    let span = document.createElement("span");
    span.className = "side-menu-item-text";
    span.textContent = textContent;

    div.appendChild(img);
    li.appendChild(div);
    li.appendChild(span);
    a.appendChild(li);
    return a;
}