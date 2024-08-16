@props(['adminUsers', 'nebulaUsers', 'novaUsers', 'neutronUsers'])
<x-layout>
    <x-mainNav />
    <main class="flex items-center justify-center flex-col">
        <main class="pt-20 ">
            <div class="mx-auto  flex items-start justify-start flex-col overflow-hidden sm:px-6 lg:px-8 pt-10">
                 <div class="flex items-center justify-center flex-col gap-2">
                    <div class="max-w-[95vw] overflow-hidden">
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-screen-3xl lg:py-16 lg:px-6">
                                <div class="mx-auto text-center flex items-center justify-center max-w-screen-2xl flex-col mb-8 lg:mb-16">
                                    <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-gray-900 dark:text-white">Notre Équipe</h2>
                                    <p class="max-w-2xl text-xl text-blue-400">Notre équipe est composée de professionnels hautement qualifiés dédiés à l'innovation et à l'excellence. Chaque membre apporte une expertise unique et un engagement à atteindre nos objectifs collectifs.</p>
                                </div>
                                <div class="text-center flex items-center justify-center flex-col gap-16 ">
                                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Administrateurs</h2>
                                    <p class="max-w-xl">Notre équipe est dirigée par des administrateurs dévoués qui assurent le bon fonctionnement et l'orientation stratégique. Jihane, notre administratrice principale, et un autre administrateur compétent apportent un leadership exceptionnel et une expertise technique, supervisant les projets pour maintenir notre équipe concentrée et innovante.</p>

                                   <div class="flex items-center justify-center flex-row-reverse max-w-screen-4xl mb-20 gap-24 min-h-[40vh] ">
                                    @foreach($adminUsers as $admin)
                                        <x-team-admin :user="$admin" />
                                    @endforeach
                                   </div>
                                </div>
                                <div class="grid gap-5 md:grid-cols-3 mb-20">
                                    <div>
                                        <div class="flex items-start justify-center min-w-[450px]">
                                            <h2 class="text-4xl mb-10  bg-gray-100/60 cursor-pointer p-3 tracking-tight font-bold text-blue-700 flex items-center justify-center gap-20  text-center   dark:text-white max-w-[250px]" id="nebulaControl"> <span>Nebula</span>
                                                <span><i class='bx bxs-down-arrow'></i></span>
                                            </h2>
                                        </div>

                                        <div class="flex items-start justify-start flex-col gap-10 hidden" id="nebula">
                                        @foreach($nebulaUsers as $nebula)
                                            <x-team-member :user="$nebula" />
                                        @endforeach
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-start justify-center min-w-[450px]">
                                            <h2 class="text-4xl mb-10 bg-gray-100/60 cursor-pointer p-3 tracking-tight font-bold flex items-center justify-center gap-20  text-center  text-blue-700 dark:text-white max-w-[250px]" id="novaControl"> <span>Nova</span>
                                                <span><i class='bx bxs-down-arrow'></i></span>
                                            </h2>
                                        </div>
                                        <div class="flex items-start justify-start flex-col gap-10 hidden" id="nova">
                                        @foreach($novaUsers as $nova)
                                            <x-team-member :user="$nova" />
                                        @endforeach
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-start justify-center min-w-[450px]">
                                            <h2 class="text-4xl mb-10 bg-gray-100/60 cursor-pointer gap-20 p-3 tracking-tight font-bold flex items-center justify-center  text-center  text-blue-700 dark:text-white max-w-[250px]" id="neutronControl"> <span>Neutron</span>
                                                <span><i class='bx bxs-down-arrow'></i></span>
                                            </h2>
                                        </div>
                                        <div class="flex items-start justify-start flex-col gap-10 hidden"  id="neutron">
                                            @foreach($neutronUsers as $neutron)
                                                <x-team-member :user="$neutron" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </main>
</x-layout>



<script>
    const nebulaControl = document.getElementById('nebulaControl');
    const novaControl = document.getElementById('novaControl');
    const neutronControl = document.getElementById('neutronControl');
    const nebula = document.getElementById('nebula');
    const nova = document.getElementById('nova');
    const neutron = document.getElementById('neutron');

    nebulaControl.addEventListener('click', () => {
        nebula.classList.toggle('hidden');
        nova.classList.add('hidden');
        neutron.classList.add('hidden');
    });

    novaControl.addEventListener('click', () => {
        nova.classList.toggle('hidden');
        nebula.classList.add('hidden');
        neutron.classList.add('hidden');
    });

    neutronControl.addEventListener('click', () => {
        neutron.classList.toggle('hidden');
        nebula.classList.add('hidden');
        nova.classList.add('hidden');
    });
</script>
