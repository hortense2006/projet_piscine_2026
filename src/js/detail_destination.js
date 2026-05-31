const destinations = {
            santorin: {
                name: "Santorin, Grèce",
                image: "images/image_santorin.avif",
                description: "Séjour lumineux entre villages blancs, falaises volcaniques et couchers de soleil sur la mer Égée.",
                price: "899 € pour 5 jours",
                hotels: ["Suites Bleues Égéennes", "Hôtel Coucher de soleil à Oia", "Résidence Vue Caldeira"],
                activities: ["Croisière dans la caldeira", "Visite d'Oia", "Dégustation locale"],
                hotelChoice: "Hôtel Coucher de soleil à Oia",
                activityChoice: "Croisière dans la caldeira"
            },
            bali: {
                name: "Bali, Indonésie",
                image: "images/image_bali.avif",
                description: "Destination tropicale entre temples, rizières, plages et ambiance relaxante.",
                price: "699 € pour 7 jours",
                hotels: ["Pavillon Jardin d'Ubud", "Résidence Plage de Bali", "Hôtel Baie de Seminyak"],
                activities: ["Temple d'Uluwatu", "Rizières de Tegallalang", "Cours de surf"],
                hotelChoice: "Résidence Plage de Bali",
                activityChoice: "Rizières de Tegallalang"
            },
            maldives: {
                name: "Maldives",
                image: "images/image_maldives.avif",
                description: "Lagon turquoise, villas sur pilotis et séjour calme pour profiter de l'océan.",
                price: "1299 € pour 6 jours",
                hotels: ["Résidence Perle du Lagon", "Villas Île de Corail", "Retraite Récif Bleu"],
                activities: ["Plongée avec masque et tuba", "Excursion en bateau", "Dîner sur la plage"],
                hotelChoice: "Villas Île de Corail",
                activityChoice: "Plongée avec masque et tuba"
            },
            paris: {
                name: "Paris, France",
                image: "images/image_paris.avif",
                description: "Séjour urbain culturel avec monuments iconiques, musées, promenades et gastronomie.",
                price: "499 € pour 4 jours",
                hotels: ["Hôtel Rive Gauche", "Séjour Central Paris", "Boutique Montmartre"],
                activities: ["Tour Eiffel", "Musée du Louvre", "Balade sur la Seine"],
                hotelChoice: "Hôtel Rive Gauche",
                activityChoice: "Musée du Louvre"
            },
            mykonos: {
                name: "Mykonos, Grèce",
                image: "images/image_mykonos.avif",
                description: "Séjour ensoleillé entre plages, ruelles blanches et atmosphère festive des Cyclades.",
                price: "759 € pour 5 jours",
                hotels: ["Hôtel Baie des Cyclades", "Suites Blanches de Mykonos", "Séjour Plage d'Ornos"],
                activities: ["Plage d'Ornos", "Vieux port", "Soirée à Little Venice"],
                hotelChoice: "Hôtel Baie des Cyclades",
                activityChoice: "Plage d'Ornos"
            },
            dubai: {
                name: "Dubaï, Émirats",
                image: "images/image_dubai.avif",
                description: "Voyage urbain entre skyline spectaculaire, désert, shopping et expériences modernes.",
                price: "849 € pour 5 jours",
                hotels: ["Marina Gratte-ciel Hotel", "Séjour Centre-ville Palm", "Résidence Porte du Désert"],
                activities: ["Burj Khalifa", "Safari désert", "Marina de Dubaï"],
                hotelChoice: "Marina Gratte-ciel Hotel",
                activityChoice: "Safari désert"
            },
            marrakech: {
                name: "Marrakech, Maroc",
                image: "images/image_marrakech.avif",
                description: "Immersion dans les souks, jardins, palais et couleurs chaudes de la médina.",
                price: "429 € pour 4 jours",
                hotels: ["Riad Atlas", "Medina Garden House", "Palmeraie Lodge"],
                activities: ["Jardin Majorelle", "Place Jemaa el-Fna", "Souks de la médina"],
                hotelChoice: "Riad Atlas",
                activityChoice: "Jardin Majorelle"
            },
            venise: {
                name: "Venise, Italie",
                image: "images/image_venise.avif",
                description: "Escapade romantique au fil des canaux, des ponts et des palais vénitiens.",
                price: "389 € pour 3 jours",
                hotels: ["Hôtel Vue Canal", "Résidence Saint-Marc", "Boutique Laguna"],
                activities: ["Balade en gondole", "Place Saint-Marc", "Pont du Rialto"],
                hotelChoice: "Hôtel Vue Canal",
                activityChoice: "Balade en gondole"
            },
            tokyo: {
                name: "Tokyo, Japon",
                image: "images/image_tokyo.avif",
                description: "Grande ville vibrante entre temples, quartiers futuristes, gastronomie et culture pop.",
                price: "1390 € pour 8 jours",
                hotels: ["Hôtel Urbain Shinjuku", "Séjour Jardin de Tokyo", "Auberge Vue Asakusa"],
                activities: ["Carrefour de Shibuya", "Temple Senso-ji", "Akihabara"],
                hotelChoice: "Hôtel Urbain Shinjuku",
                activityChoice: "Temple Senso-ji"
            },
            sydney: {
                name: "Sydney, Australie",
                image: "images/image_sydney.avif",
                description: "Séjour océanique entre plages, opéra, quartiers animés et panoramas australiens.",
                price: "1590 € pour 9 jours",
                hotels: ["Hôtel Vue Port", "Séjour Plage de Bondi", "Suites Quartier Opéra"],
                activities: ["Opéra de Sydney", "Plage de Bondi", "Pont du port"],
                hotelChoice: "Hôtel Vue Port",
                activityChoice: "Plage de Bondi"
            },
            rio: {
                name: "Rio, Brésil",
                image: "images/image_rio.avif",
                description: "Voyage énergique entre plages mythiques, musique, montagnes et vue sur la baie.",
                price: "990 € pour 7 jours",
                hotels: ["Hôtel Bleu Copacabana", "Séjour Soleil Ipanema", "Pavillon Vue Pain de Sucre"],
                activities: ["Christ Rédempteur", "Pain de Sucre", "Copacabana"],
                hotelChoice: "Hôtel Bleu Copacabana",
                activityChoice: "Christ Rédempteur"
            },
            alpes_suisses: {
                name: "Alpes suisses",
                image: "images/image_alpessuisses.avif",
                description: "Séjour montagne entre lacs, chalets, randonnées et paysages alpins apaisants.",
                price: "799 € pour 6 jours",
                hotels: ["Pavillon Lac Alpin", "Hôtel Pic Suisse", "Chalet Panorama"],
                activities: ["Randonnée panoramique", "Train de montagne", "Lac alpin"],
                hotelChoice: "Hôtel Pic Suisse",
                activityChoice: "Randonnée panoramique"
            },
            bruxelles: {
                name: "Bruxelles, Belgique",
                image: "images/image_bruxelles.jpg",
                description: "Court séjour culturel entre architecture, musées, chocolat et centre historique.",
                price: "329 € pour 3 jours",
                hotels: ["Hôtel Grand-Place", "Séjour Sablon Centre-ville", "Pavillon Atomium"],
                activities: ["Grand-Place", "Atomium", "Parcours BD"],
                hotelChoice: "Hôtel Grand-Place",
                activityChoice: "Grand-Place"
            },
            tunis: {
                name: "Tunis, Tunisie",
                image: "images/image_tunis.jpg",
                description: "Destination accessible autour de la médina, des marchés et des sites côtiers.",
                price: "359 € pour 4 jours",
                hotels: ["Hôtel Ville de Carthage", "Séjour Central Médina", "Pavillon Sidi Bou"],
                activities: ["Médina de Tunis", "Carthage", "Sidi Bou Saïd"],
                hotelChoice: "Séjour Central Médina",
                activityChoice: "Sidi Bou Saïd"
            },
            naples: {
                name: "Naples, Italie",
                image: "images/image_naples.avif",
                description: "Ville intense entre littoral, ruelles, patrimoine et cuisine italienne généreuse.",
                price: "379 € pour 4 jours",
                hotels: ["Hôtel Centre de Naples", "Séjour Vue Vésuve", "Boutique du Port"],
                activities: ["Centre historique", "Pompéi", "Vue sur le Vésuve"],
                hotelChoice: "Hôtel Centre de Naples",
                activityChoice: "Pompéi"
            },
            split: {
                name: "Split, Croatie",
                image: "images/image_split.jpg",
                description: "Séjour adriatique autour du palais antique, du front de mer et des îles proches.",
                price: "459 € pour 5 jours",
                hotels: ["Hôtel Baie de Riva", "Séjour Dioclétien", "Jardin Adriatique"],
                activities: ["Palais de Dioclétien", "Excursion îles", "Plage Bacvice"],
                hotelChoice: "Hôtel Baie de Riva",
                activityChoice: "Excursion îles"
            },
            doha: {
                name: "Doha, Qatar",
                image: "images/image_doha.jpg",
                description: "Ville moderne avec musées, promenade maritime, architecture et ambiance désertique.",
                price: "689 € pour 5 jours",
                hotels: ["Hôtel Vue Corniche", "Séjour Souq Waqif", "Résidence Perle du Désert"],
                activities: ["Musée national", "Souq Waqif", "Corniche"],
                hotelChoice: "Séjour Souq Waqif",
                activityChoice: "Musée national"
            },
            innsbruck: {
                name: "Innsbruck, Autriche",
                image: "images/image_innsbruck.jpg",
                description: "Destination alpine plus calme pour profiter de la montagne, du centre ancien et des vues.",
                price: "549 € pour 5 jours",
                hotels: ["Hôtel Montagne du Tyrol", "Vieille Ville Innsbruck", "Pavillon Nordkette"],
                activities: ["Nordkette", "Vieille ville", "Randonnée alpine"],
                hotelChoice: "Hôtel Montagne du Tyrol",
                activityChoice: "Nordkette"
            }
        };

        // gestion du beandeau de navigation
        const statutConnexion = localStorage.getItem("statutConnexion");
        const navVisiteur = document.getElementById("nav-visiteur");
        const navConnecte = document.getElementById("nav-connecte");
        const btnDeconnexion = document.getElementById("btn-deconnexion");

        if (statutConnexion === "connecte") {
            if (navVisiteur) navVisiteur.style.display = "none";
            if (navConnecte) navConnecte.style.display = "flex";
        }

        btnDeconnexion?.addEventListener("click", (e) => {
            e.preventDefault();
            localStorage.removeItem("statutConnexion");
            window.location.reload();
        });

        const params = new URLSearchParams(window.location.search);
        const key = params.get("destination") || "santorin";
        const destination = destinations[key] || destinations.santorin;

        document.title = `VoyageVista - ${destination.name}`;
        document.getElementById("destination-name").textContent = destination.name;
        document.getElementById("destination-image").src = destination.image;
        document.getElementById("destination-image").alt = destination.name;
        document.getElementById("destination-description").textContent = destination.description;
        document.getElementById("destination-price").textContent = destination.price;
        const hotelList = document.getElementById("destination-hotels");
        const activityList = document.getElementById("destination-activities");
        const hotelChoice = document.getElementById("hotel-choice");
        const activityMenu = document.getElementById("activity-menu");
        const activitySummary = document.getElementById("activity-summary");
        const activityOptions = document.getElementById("activity-options");
        const cartMessage = document.getElementById("cart-message");
        const addHotelButton = document.getElementById("add-hotel");
        const addActivityButton = document.getElementById("add-activity");
        const cartItems = document.getElementById("cart-items");
        const cartCount = document.getElementById("cart-count");
        const cartTotal = document.getElementById("cart-total");
        const sortCartButton = document.getElementById("sort-cart");
        const reservationTravelers = document.getElementById("reservation-travelers");
        const departureDate = document.getElementById("departure-date");
        const returnDate = document.getElementById("return-date");
        const transportChoice = document.getElementById("transport-choice");
        const transportOptions = ["Avion", "Train", "Voiture", "Bateau", "Car"];

        function getSavedReservation() {
            const savedReservation = JSON.parse(localStorage.getItem("voyagevistaReservation") || "null");
            return savedReservation && savedReservation.slug === key ? savedReservation : null;
        }

        function getDurationDays() {
            const durationMatch = destination.price.match(/(\d+)\s*jours?/);
            return durationMatch ? Number.parseInt(durationMatch[1], 10) : 1;
        }

        function formatDateValue(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, "0");
            const day = String(date.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        }

        function getDefaultDepartureDate() {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            return formatDateValue(tomorrow);
        }

        function getTravelerCount() {
            if (reservationTravelers.value === "Famille") {
                return 4;
            }

            return Number.parseInt(reservationTravelers.value, 10) || 1;
        }

        function saveReservationOptions() {
            localStorage.setItem("voyagevistaReservation", JSON.stringify({
                destination: destination.name,
                slug: key,
                depart: departureDate.value,
                retour: returnDate.value,
                voyageurs: reservationTravelers.value,
                transport: transportChoice.value,
                duree: getDurationDays()
            }));
        }

        function updateReturnDate() {
            if (!departureDate.value) {
                returnDate.value = "";
                saveReservationOptions();
                return;
            }

            const computedReturnDate = new Date(`${departureDate.value}T00:00:00`);
            computedReturnDate.setDate(computedReturnDate.getDate() + getDurationDays());
            returnDate.value = formatDateValue(computedReturnDate);
            saveReservationOptions();
        }

        function setupReservationOptions() {
            const savedReservation = getSavedReservation();
            reservationTravelers.value = savedReservation?.voyageurs || "2 adultes";
            departureDate.value = savedReservation?.depart || getDefaultDepartureDate();
            transportChoice.value = savedReservation?.transport || "Avion";
            updateReturnDate();
        }

        transportOptions.forEach((transport) => {
            const option = document.createElement("option");
            option.value = transport;
            option.textContent = transport;
            transportChoice.appendChild(option);
        });

        destination.hotels.forEach((hotel) => {
            const item = document.createElement("li");
            item.textContent = hotel;
            hotelList.appendChild(item);

            const option = document.createElement("option");
            option.value = hotel;
            option.textContent = hotel;
            option.selected = hotel === destination.hotelChoice;
            hotelChoice.appendChild(option);
        });

        destination.activities.forEach((activity) => {
            const item = document.createElement("li");
            item.textContent = activity;
            activityList.appendChild(item);

            const optionLabel = document.createElement("label");
            optionLabel.className = "activity-option";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.value = activity;
            checkbox.checked = activity === destination.activityChoice;

            const optionText = document.createElement("span");
            optionText.textContent = activity;

            optionLabel.appendChild(checkbox);
            optionLabel.appendChild(optionText);
            activityOptions.appendChild(optionLabel);
        });

        function getSelectedActivities() {
            return Array.from(activityOptions.querySelectorAll("input:checked")).map((input) => input.value);
        }

        function updateActivitySummary() {
            const selectedActivities = getSelectedActivities();
            if (selectedActivities.length === 0) {
                activitySummary.textContent = "Sélectionner des activités";
                return;
            }

            if (selectedActivities.length === 1) {
                activitySummary.textContent = selectedActivities[0];
                return;
            }

            activitySummary.textContent = `${selectedActivities.length} activités sélectionnées`;
        }

        activityOptions.addEventListener("change", updateActivitySummary);
        updateActivitySummary();

        function getCart() {
            return JSON.parse(localStorage.getItem("voyagevistaCart") || "[]");
        }

        function saveCart(cart) {
            localStorage.setItem("voyagevistaCart", JSON.stringify(cart));
        }

        function getBasePrice() {
            return Number.parseInt(destination.price, 10) || 0;
        }

        function getItemPrice(type) {
            const basePrice = getBasePrice();
            const unitPrice = type === "hôtel" ? basePrice : Math.round(basePrice * 0.12);
            return unitPrice * getTravelerCount();
        }

        function formatPrice(price) {
            return `${price} €`;
        }

        function getCartGroups(cart) {
            return cart.reduce((groups, item) => {
                const key = `${item.destination}|${item.type}|${item.label}|${item.depart || ""}|${item.retour || ""}|${item.voyageurs || ""}|${item.transport || ""}`;
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

        function renderCart() {
            const cart = getCart();
            const groupedCart = Object.values(getCartGroups(cart));
            cartItems.innerHTML = "";
            cartCount.textContent = cart.length;

            const total = cart.reduce((sum, item) => sum + (Number(item.price) || 0), 0);
            cartTotal.textContent = formatPrice(total);

            if (cart.length === 0) {
                const emptyMessage = document.createElement("p");
                emptyMessage.className = "empty-cart";
                emptyMessage.textContent = "Votre panier est vide.";
                cartItems.appendChild(emptyMessage);
                return;
            }

            groupedCart.forEach((item) => {
                const row = document.createElement("div");
                row.className = "cart-item";

                const details = document.createElement("div");
                const title = document.createElement("strong");
                title.textContent = item.count > 1 ? `${item.label} (x${item.count})` : item.label;
                const meta = document.createElement("span");
                const reservationMeta = item.depart && item.retour
                    ? ` · ${item.voyageurs} · du ${item.depart} au ${item.retour}`
                    : "";
                meta.textContent = `${item.destination} · ${item.type}${reservationMeta}`;
                const transportMeta = item.transport || "Transport non renseigne";
                if (item.depart && item.retour) {
                    meta.textContent = `${item.destination} - ${item.type} - ${item.voyageurs} - ${transportMeta} - du ${item.depart} au ${item.retour}`;
                }

                details.appendChild(title);
                details.appendChild(meta);

                const price = document.createElement("span");
                price.className = "cart-price";
                price.textContent = formatPrice(item.totalPrice);

                const removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.textContent = "Supprimer";
                removeButton.addEventListener("click", () => {
                    const updatedCart = getCart().filter((cartItem) => {
                        return !(
                            cartItem.destination === item.destination &&
                            cartItem.type === item.type &&
                            cartItem.label === item.label
                        );
                    });
                    saveCart(updatedCart);
                    renderCart();
                    cartMessage.textContent = `${item.label} a été retiré du panier.`;
                });

                row.appendChild(details);
                row.appendChild(price);
                row.appendChild(removeButton);
                cartItems.appendChild(row);
            });
        }

        function addToCart(type, label) {
            const statutConnexion = localStorage.getItem("statutConnexion");
            if (statutConnexion !== "connecte") {
                alert("Vous devez d'abord vous connecter ou créer un compte pour pouvoir planifier un séjour.");
                window.location.href = "connexion.html";
                return;
            }

            const cart = getCart();
            cart.push({
                type,
                label,
                destination: destination.name,
                price: getItemPrice(type),
                depart: departureDate.value,
                retour: returnDate.value,
                voyageurs: reservationTravelers.value,
                transport: transportChoice.value,
                duree: getDurationDays(),
                date: new Date().toISOString()
            });
            saveCart(cart);
            cartMessage.textContent = `${label} a été ajouté au panier.`;
            renderCart();
        }

        addHotelButton.addEventListener("click", () => {
            addToCart("hôtel", hotelChoice.value);
        });

        addActivityButton.addEventListener("click", () => {
            const selectedActivities = getSelectedActivities();
            if (selectedActivities.length === 0) {
                cartMessage.textContent = "Sélectionnez au moins une activité.";
                return;
            }

            selectedActivities.forEach((activity) => {
                addToCart("activité", activity);
            });
            activityMenu.open = false;
        });

        sortCartButton.addEventListener("click", () => {
            const cart = getCart().sort((first, second) => first.label.localeCompare(second.label));
            saveCart(cart);
            renderCart();
        });

        departureDate.addEventListener("change", updateReturnDate);
        reservationTravelers.addEventListener("change", () => {
            saveReservationOptions();
            renderCart();
        });
        transportChoice.addEventListener("change", () => {
            saveReservationOptions();
            renderCart();
        });

        setupReservationOptions();
        renderCart();
        

