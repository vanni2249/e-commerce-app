@props(['name' => 'Geovanni Colon Barrios', 'address' => 'Urbanizacion Villas del Prado, Calle del Sol 125, Juana Diaz PR 00795', 'phone' => '+1 (555) 123-4567'])
<ul class="text-gray-600">
    <li class="flex flex-col py-1">
        <span class="text-sm font-bold">Name</span>
        <span class=" text-gray-500">Geovanni Colon Barrios</span>
    </li>
    <li class="flex flex-col py-2">
        <span class="text-sm font-bold">Address</span>
        <span class=" text-gray-500">
            Urbanizacion Villas del Prado,
            <br>
            Calle del Sol 125,
            <br>
            Juana Diaz PR 00795
        </span>
    </li>
    <li class="flex flex-col py-1">
        <span class="text-sm font-bold">Phone</span>
        <span class="text-gray-500">+1 (555) 123-4567</span>
    </li>
</ul>
@if (request()->segment(1) === 'addresses')
<footer class="mt-4">
    <x-button variant="light" size="sm">Edit</x-button>
    <x-button variant="light" size="sm">Delete</x-button>
    <x-button variant="light" size="sm">Set as Default</x-button>
</footer>
@endif