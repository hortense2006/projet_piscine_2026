function formatPrice(price) {
    return `${price} €`;
}

function getConfirmation() {
    return JSON.parse(localStorage.getItem("voyagevistaDerniereCommande") || "null");
}

function resetReservationStorage() {
    localStorage.removeItem("voyagevistaCart");
    localStorage.removeItem("voyagevistaReservation");
    localStorage.removeItem("voyagevistaDerniereCommande");
}

function renderConfirmation() {
    const confirmation = getConfirmation();
    const itemsContainer = document.getElementById("confirmation-items");
    const totalElement = document.getElementById("confirmation-total");
    const countElement = document.getElementById("confirmation-count");

    if (!confirmation || !Array.isArray(confirmation.items) || confirmation.items.length === 0) {
        itemsContainer.innerHTML = "<p class='empty-order'>Aucun détail de commande n'est disponible.</p>";
        countElement.textContent = "0";
        totalElement.textContent = formatPrice(Number(new URLSearchParams(window.location.search).get("total")) || 0);
        resetReservationStorage();
        return;
    }

    itemsContainer.innerHTML = "";
    countElement.textContent = confirmation.items.length;
    totalElement.textContent = formatPrice(Number(confirmation.total) || 0);

    confirmation.items.forEach((item) => {
        const row = document.createElement("div");
        row.className = "order-item";

        const details = document.createElement("div");
        const title = document.createElement("strong");
        title.textContent = item.label;

        const meta = document.createElement("span");
        const reservationMeta = item.depart && item.retour
            ? ` · ${item.voyageurs} · du ${item.depart} au ${item.retour}`
            : "";
        meta.textContent = `${item.destination} · ${item.type}${reservationMeta}`;

        const price = document.createElement("span");
        price.className = "order-price";
        price.textContent = formatPrice(Number(item.price) || 0);

        const transportMeta = item.transport || "Transport non renseigne";
        if (item.depart && item.retour) {
            meta.textContent = `${item.destination} - ${item.type} - ${item.voyageurs} - ${transportMeta} - du ${item.depart} au ${item.retour}`;
        }

        details.appendChild(title);
        details.appendChild(meta);
        row.appendChild(details);
        row.appendChild(price);
        itemsContainer.appendChild(row);
    });

    resetReservationStorage();
}

renderConfirmation();
