const searchForm = document.querySelector("#search-form");
const searchInput = searchForm?.querySelector("input[type='search']");
const destinationCards = Array.from(document.querySelectorAll(".destination-card"));
const emptySearch = document.querySelector("#empty-search");
const destinationsSection = document.querySelector("#destinations");

const normalizeText = (text) =>
    text
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .trim();

const filterDestinations = () => {
    if (!searchInput) {
        return;
    }

    const query = normalizeText(searchInput.value);
    let visibleCards = 0;

    destinationCards.forEach((card) => {
        const searchableText = normalizeText(card.textContent);
        const matchesSearch = query === "" || searchableText.includes(query);

        card.classList.toggle("is-hidden", !matchesSearch);
        if (matchesSearch) {
            visibleCards += 1;
        }
    });

    emptySearch?.classList.toggle("is-visible", visibleCards === 0);
};

searchInput?.addEventListener("input", filterDestinations);
searchInput?.addEventListener("search", filterDestinations);

searchForm?.addEventListener("submit", (event) => {
    event.preventDefault();
    filterDestinations();
    destinationsSection?.scrollIntoView({ behavior: "smooth", block: "start" });
});
