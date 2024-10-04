{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <div class="flex justify-between sm:items-center flex-col sm:flex-row" style="gap: 12px">--}}
{{--            <h2 class="font-medium text-xl text-gray-800 leading-tight">--}}
{{--                Tableau de bord--}}
{{--            </h2>--}}
{{--            <div>--}}
{{--                <x-link-button-primary link="{{ route('admin.workspace.create') }}">Créer un Workspace--}}
{{--                </x-link-button-primary>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900">--}}
{{--                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">--}}
{{--                        @foreach($workspaces as $workspace)--}}
{{--                            <div class="border border-gray-200 rounded-lg">--}}
{{--                                <div class="p-4 relative">--}}
{{--                                    <a href="{{ route('admin.workspace.show', $workspace->slug) }}"--}}
{{--                                       class="text-md pb-1 font-bold">{{ $workspace->name }}</a>--}}
{{--                                    <p class="text-gray-500 text-sm">--}}
{{--                                        {{ $workspace->users_count }} utilisateurs--}}
{{--                                        @if($workspace->can_access_image === true)--}}
{{--                                            <i class="fas fa-image ml-1 text-primary"></i>--}}
{{--                                        @else--}}
{{--                                            <i class="fas fa-image ml-1"></i>--}}
{{--                                        @endif--}}
{{--                                        @if($workspace->can_access_comment === true)--}}
{{--                                            <i class="fas fa-comment ml-1 text-primary"></i>--}}
{{--                                        @else--}}
{{--                                            <i class="fas fa-comment ml-1"></i>--}}
{{--                                        @endif--}}
{{--                                        @if($workspace->can_access_stat === true)--}}
{{--                                            <i class="fas fa-chart-bar ml-1 text-primary"></i>--}}
{{--                                        @else--}}
{{--                                            <i class="fas fa-chart-bar ml-1"></i>--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                    <div class="absolute top-4 right-4">--}}
{{--                                        <a href="{{ route('admin.workspace.edit', $workspace) }}"--}}
{{--                                           class="normal-case text-sm font-medium opacity-40 hover:opacity-100">--}}
{{--                                            Edit--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="px-4 mb-4">--}}
{{--                                    <p class="font-semibold text-sm pb-1">Urls Api module :</p>--}}
{{--                                    <div class="flex items-center justify-between gap-1 mt-2">--}}
{{--                                        <x-text-input type="text" class="block w-full text-gray-500 text-xs"--}}
{{--                                                      :value="env('APP_URL') . '/api/comment/' . $workspace->uuid"/>--}}
{{--                                        <x-secondary-button--}}
{{--                                            type="button"--}}
{{--                                            data-copy="{{ env('APP_URL') . '/api/comment/' . $workspace->uuid }}"--}}
{{--                                            onclick="copyToClipboard(this)"--}}
{{--                                            style="padding-left: 12px; padding-right: 12px">--}}
{{--                                            <i class="text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]"></i>--}}
{{--                                        </x-secondary-button>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex items-center justify-between gap-1 mt-2">--}}
{{--                                        <x-text-input type="text" class="block w-full text-gray-500 text-xs"--}}
{{--                                                      :value="env('APP_URL') . '/api/stat/' . $workspace->uuid"/>--}}
{{--                                        <x-secondary-button--}}
{{--                                            type="button"--}}
{{--                                            data-copy="{{ env('APP_URL') . '/api/stat/' . $workspace->uuid }}"--}}
{{--                                            onclick="copyToClipboard(this)"--}}
{{--                                            style="padding-left: 12px; padding-right: 12px">--}}
{{--                                            <i class="text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]"></i>--}}
{{--                                        </x-secondary-button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="border-t border-gray-200 grid grid-cols-2">--}}
{{--                                    <a href="{{ route('admin.workspace.users', $workspace) }}"--}}
{{--                                       class="flex justify-center items-center text-center py-3 font-medium text-sm border-r border-gray-200 hover:bg-gray-50">--}}
{{--                                        <i class="fas fa-users mr-2 text-gray-600"></i> Utilisateurs--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('admin.authorisation.show', $workspace) }}"--}}
{{--                                       class="flex justify-center items-center text-center py-3 font-medium text-sm hover:bg-gray-50">--}}
{{--                                        <i class="fas fa-lock mr-2 text-gray-600"></i> Modules--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

{{--<script>--}}
{{--    function copyToClipboard(element) {--}}
{{--        var text = element.getAttribute('data-copy');--}}
{{--        var input = document.createElement('input');--}}
{{--        input.setAttribute('value', text);--}}
{{--        document.body.appendChild(input);--}}
{{--        input.select();--}}
{{--        document.execCommand('copy');--}}
{{--        document.body.removeChild(input);--}}

{{--        element.innerHTML = "<i class='text-xs fas fa-clipboard-check text-gray-600 w-[12px] h-[16px] text-primary'></i>";--}}

{{--        window.setTimeout(function () {--}}
{{--            element.innerHTML = "<i class='text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]'></i>";--}}
{{--        }, 2000);--}}
{{--    }--}}

{{--    document.getElementById('image').addEventListener('change', function (e) {--}}
{{--        var fileName = e.target.files[0].name;--}}
{{--        var nameInput = document.getElementById('name');--}}
{{--        if (nameInput.value === '') {--}}
{{--            nameInput.value = fileName;--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta name="x-apple-disable-message-reformatting"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Righteous&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
<body style="background-color:#ffffff;font-family: Open-Sans,sans-serif">
<table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation"
       style="max-width:560px;margin:0 auto;padding:20px 0 48px">
    <tbody>
    <tr style="width:100%">
        <td>
            {{--            <img src="{{ $imageUrl }}" alt="Logo"--}}
            {{--                 style="display:block;outline:none;border:none;text-decoration:none;width:auto;height:42px"--}}
            {{--                 width="130"--}}
            {{--                 height="42"--}}
            {{--            />--}}

            <h1 style="font-size:24px;letter-spacing:-0.5px;line-height:1.3;font-weight:400;color:#484848;padding:17px 0 0">
                Votre lien de connexion
            </h1>
            <div style="padding:27px 0 27px">
                <a href="{{ route('loginWithToken', 'fvrced') }}"
                   style="letter-spacing: 1px;text-transform: uppercase; text-decoration:none;display:block;max-width:100%;background-color:#0075F0;border-radius:4px;font-weight:500;color:#fff;font-size:15px;text-align:center;padding:14px 32px 14px 32px"
                   target="_blank">
                    <span
                        style="padding: 0 12px; min-width:100%; width: 100%;text-align: center">
                        Connectez - vous
                    </span>
                </a>
            </div>

            <p style="padding-bottom: 12px">
                Lien de connexion : <a href="{{ route('loginWithToken', 'fvrced') }}"
                                       target="_blank">{{ route('loginWithToken', 'fvrced') }}</a>
            </p>
            <p style="font-size:15px;line-height:1.4;margin:0 0 15px;color:#3c4149">Important : ce lien expire à {{ now()->addMinutes(10)->format('d/m/Y à h:i') }}</p>
            <hr style="width:100%;border:none;border-top:1px solid #eaeaea;border-color:#dfe1e4;margin:42px 0 26px"/>
            <a href="https://google.com" style="color:#b4becc;text-decoration:none;font-size:14px" target="_blank">Pbi
                toolbox</a>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
