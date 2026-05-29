function getCart() {
    return JSON.parse(localStorage.getItem("voyagevistaCart") || "[]");
}

function saveCart(cart) {
    localStorage.setItem("voyagevistaCart", JSON.stringify(cart));
}

function formatPrice(price) {
    return `${price} €`;
}

function getCartGroups(cart) {
    return cart.reduce((groups, item) => {
        const key = `${item.destination}|${item.type}|${item.label}|${item.depart || ""}|${item.retour || ""}|${item.voyageurs || ""}`;
        if (!groups[key]) {
            groups[key] = {
                ...item,
                count: 0,
                totalPrice: 0
            };
        }

        groups[key].count += 1;
        groups[key].totalPrice += Number(item.price) || 0;
        return groups;
    }, {});
}

const orderItems = document.getElementById("order-items");
const orderCount = document.getElementById("order-count");
const orderTotal = document.getElementById("order-total");
const payButton = document.getElementById("pay-button");
const paymentMessage = document.getElementById("payment-message");

function renderOrder() {
    const cart = getCart();
    const groupedCart = Object.values(getCartGroups(cart));
    const total = cart.reduce((sum, item) => sum + (Number(item.price) || 0), 0);

    orderItems.innerHTML = "";
    orderCount.textContent = cart.length;
    orderTotal.textContent = formatPrice(total);
    payButton.disabled = cart.length === 0;

    if (cart.length === 0) {
        const emptyMessage = document.createElement("p");
        emptyMessage.className = "empty-order";
        emptyMessage.textContent = "Votre panier est vide. Ajoutez un hôtel ou une activité avant de payer.";
        orderItems.appendChild(emptyMessage);
        return;
    }

    groupedCart.forEach((item) => {
        const row = document.createElement("div");
        row.className = "order-item";

        const details = document.createElement("div");
        const title = document.createElement("strong");
        title.textContent = item.count > 1 ? `${item.label} (x${item.count})` : item.label;
        const meta = document.createElement("span");
        const reservationMeta = item.depart && item.retour
            ? ` · ${item.voyageurs} · du ${item.depart} au ${item.retour}`
            : "";
        meta.textContent = `${item.destination} · ${item.type}${reservationMeta}`;
        details.appendChild(title);
        details.appendChild(meta);

        const price = document.createElement("span");
        price.className = "order-price";
        price.textContent = formatPrice(item.totalPrice);

        row.appendChild(details);
        row.appendChild(price);
        orderItems.appendChild(row);
    });
}

payButton.addEventListener("click", () => {
    if (getCart().length === 0) {
        paymentMessage.textContent = "Votre panier est vide.";
        return;
    }

    saveCart([]);
    renderOrder();
    paymentMessage.textContent = "Paiement confirmé. Merci pour votre réservation.";
});

renderOrder();
