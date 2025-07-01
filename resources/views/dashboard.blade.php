<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - 3D World Explorer</title>

    <!-- TailwindCSS and Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- CesiumJS -->
    <script src="https://cesium.com/downloads/cesiumjs/releases/1.130.1/Build/Cesium/Cesium.js"></script>
    <link href="https://cesium.com/downloads/cesiumjs/releases/1.130.1/Build/Cesium/Widgets/widgets.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #030712;
            color: #e5e7eb;
        }

        #cesiumContainer {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: #000 url('https://placehold.co/1920x1080/000000/cccccc?text=Initializing+3D+View...') center center no-repeat;
            background-size: cover;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background-color: #1f2937;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: #4b5563;
            border-radius: 10px;
        }

        #elevationDisplay {
            pointer-events: none;
            backdrop-filter: blur(4px);
        }

        .cesium-widget-credits {
            display: none !important;
            /* Hide Cesium watermark */
        }
    </style>
</head>

<body class="h-screen w-screen overflow-hidden">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-gray-900 text-gray-300 flex flex-col transition-all duration-300 ease-in-out h-full">
            <div class="flex items-center justify-between p-4 border-b border-gray-700">
                <a href="index.html" class="text-white text-xl font-bold">
                    <span class="text-blue-400">3D</span>Explorer
                </a>
                <button id="sidebar-toggle" class="text-gray-400 hover:text-white lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="p-4">
                <div class="relative">
                    <!-- Placeholder for visual styling -->
                    <input id="searchInput" type="text" placeholder="Search location above..."
                        class="w-full bg-gray-800 border-gray-600 rounded-lg pl-10 pr-4 py-2 text-sm text-gray-400"
                        disabled>
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto sidebar-scroll px-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-2.5 bg-gray-800 text-white rounded-lg">
                    <i class="fas fa-tachometer-alt w-6 text-center mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-2.5 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-map-marker-alt w-6 text-center mr-3"></i>
                    <span class="font-medium">Saved Locations</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-2.5 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-route w-6 text-center mr-3"></i>
                    <span class="font-medium">My Tours</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-2.5 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-cog w-6 text-center mr-3"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-700">
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://placehold.co/100x100/7F9CF5/FFFFFF?text=U" alt="User avatar">
                   <div class="ml-3">
    <p class="text-sm font-semibold text-white">
        {{ Auth::user()->name }}
    </p>

    <!-- Logout form -->
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <button type="submit" class="text-xs text-red-400 hover:text-red-300 flex items-center">
            <i class="fas fa-sign-out-alt mr-1"></i>Logout
        </button>
    </form>
</div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col h-full relative">
            <header
                class="bg-gray-900/80 backdrop-blur-sm text-white shadow-md flex items-center justify-between p-4 lg:hidden">
                <button id="sidebar-open-btn" class="text-white">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div></div>
            </header>

            <!-- Cesium Container -->
            <div id="cesiumContainer" class="flex-1"></div>

            <!-- Elevation Overlay -->
            <div id="elevationDisplay"
                class="absolute bottom-4 left-4 bg-gray-900/80 text-white text-sm px-4 py-2 rounded-lg shadow-lg z-50">
                Elevation: <span id="elevationValue">Loading...</span> meters
            </div>
        </main>
    </div>

    <!-- JS Logic -->
    <script type="module">
        // Replace this with your Cesium token

        // Viewer
        const viewer = new Cesium.Viewer('cesiumContainer', {
            terrain: Cesium.Terrain.fromWorldTerrain(),
            animation: false,
            baseLayerPicker: false,
            timeline: false,
            geocoder: true, // Enable geocoder search
            sceneModePicker: false,
            navigationHelpButton: false,
            homeButton: false,
            fullscreenButton: false,
        });

        // Fly to default view
        viewer.camera.flyTo({
            destination: Cesium.Cartesian3.fromDegrees(-122.4175, 37.655, 4000),
            orientation: {
                heading: Cesium.Math.toRadians(0), // East (0°)
                pitch: Cesium.Math.toRadians(-45), // Tilt downward 45°
                roll: 0, // No roll
            },
        });

        // Add 3D Buildings
        (async () => {
            const buildings = await Cesium.createOsmBuildingsAsync();
            viewer.scene.primitives.add(buildings);
        })();

        // Elevation Display
        const elevationValue = document.getElementById("elevationValue");
        viewer.screenSpaceEventHandler.setInputAction(async function(movement) {
            const cartesian = viewer.scene.pickPosition(movement.endPosition);
            if (cartesian) {
                const cartographic = Cesium.Cartographic.fromCartesian(cartesian);
                const [updated] = await Cesium.sampleTerrainMostDetailed(viewer.terrainProvider, [
                    cartographic
                ]);
                elevationValue.textContent = updated.height ? updated.height.toFixed(2) : "No data";
            } else {
                elevationValue.textContent = "Unavailable";
            }
        }, Cesium.ScreenSpaceEventType.MOUSE_MOVE);

        // Sidebar toggle logic
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarOpenBtn = document.getElementById('sidebar-open-btn');
        const hideSidebar = () => sidebar.classList.add('-translate-x-full');
        const showSidebar = () => sidebar.classList.remove('-translate-x-full');
        sidebarToggle.addEventListener('click', hideSidebar);
        sidebarOpenBtn.addEventListener('click', showSidebar);
        window.innerWidth < 1024 ? hideSidebar() : showSidebar();
        window.addEventListener('resize', () => window.innerWidth < 1024 ? hideSidebar() : showSidebar());

        // Add zoom effect on geocoder result
        const geocoder = viewer.geocoder.viewModel;
        geocoder.complete.addEventListener(() => {
            const result = geocoder.searchText;
            console.log("Geocoded:", result);

            // Give time for the camera to fly to the geocoded location before tilting
            setTimeout(() => {
                viewer.camera.zoomIn(2000); // Add zoom animation
                const position = viewer.camera.positionWC; // world coordinates
                viewer.camera.lookAt(
                    position,
                    new Cesium.HeadingPitchRange(
                        Cesium.Math.toRadians(0), // heading
                        Cesium.Math.toRadians(-45), // pitch downwards
                        2000 // range (zoom distance)
                    )
                );
            }, 1500); // wait a bit longer than default flyTo duration
        });
    </script>
</body>

</html>
