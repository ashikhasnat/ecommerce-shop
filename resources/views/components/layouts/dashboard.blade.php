<x-layouts.app>
    <main class="">
        <admin-nav>
            <div slot="col-1" class="profile col-span-1 h-screen bg-gray-800">
                <nav class="text-white text-xl mt-20">
                    <ul>
                        <li class="pl-4 mb-6"><a href=""><i class="fas fa-user-circle mr-2"></i>Profile</a>
                        </li>
                        <li class="pl-4 "><a href=""><i class="fas fa-paste mr-2"></i>Post</a>
                        </li>
                        <li class="pl-4 my-6"><a href=""><i class="fas fa-th-list mr-2"></i>Category</a></li>

                    </ul>
                </nav>
            </div>
            <div slot="col-5">
                {{ $slot }}
            </div>
        </admin-nav>
    </main>
    {{-- <script>
        const messageDel = document.querySelector('#session-delete')
        const messageMsg = document.querySelector('#session-msg')
        setTimeout(() => {
            messageDel.style.opacity = '0'
            messageDel.style.transition = 'ease-in .5s'
        }, 2000);
        setTimeout(() => {
            messageMsg.style.opacity = '0'
            messageMsg.style.transition = 'ease-in .5s'
        }, 2000);
    </script> --}}
</x-layouts.app>