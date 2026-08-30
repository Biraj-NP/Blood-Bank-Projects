<!-- Card -->
<div class="bg-white rounded-2xl overflow-hidden
            shadow-md
            hover:shadow-2xl
            hover:-translate-y-2
            transition-all duration-300
            cursor-pointer">

    <!-- Image -->
    <div class="w-full h-52 overflow-hidden">

        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            class="w-full h-full object-cover object-center
                   hover:scale-110
                   transition-transform duration-500"
        >

    </div>


    <!-- Content -->
    <div class="p-5">

        <!-- Title -->
        <h1 class="text-2xl font-bold text-gray-800 mb-3
                   hover:text-red-600 transition-colors duration-300">

            {{ $title }}

        </h1>


        <!-- Description -->
        <p class="text-gray-600 mb-4">

            Donate Blood and Save Lives

        </p>


        <!-- Details -->
        <div class="space-y-2 text-sm text-gray-700">

            <p>
                <span class="font-bold text-red-600">
                    Location:
                </span>

                {{ $location }}
            </p>


            <p>
                <span class="font-bold text-red-600">
                    Start Date:
                </span>

                {{ $startdate }}
            </p>


            <p>
                <span class="font-bold text-red-600">
                    Ending Date:
                </span>

                {{ $enddate }}

            </p>

        </div>

    </div>

</div>
