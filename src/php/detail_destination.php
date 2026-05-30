<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "VoyageVista";
    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la destination</title>
    <link rel="stylesheet" href="src/css/detail_destination.css">
    <script src="src/js/detail_destination.js" defer></script>
</head>
<body>
    <script>
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
    </script>
    <div class="container">