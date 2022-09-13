<ul class="list-group">
    <li class="list-group-item {{ $selected=='general_information' ? 'active':'' }}">
        <a href="{{ route('admin.person.generalInformation.index',$person) }}" class="{{ $selected=='general_information' ? 'text-white':'' }}">
            {{ __('app.general_information') }}
        </a>
    </li>
    <li class="list-group-item">....</li>
    <li class="list-group-item">....</li>
    <li class="list-group-item {{ $selected=='address_informations' ? 'active':'' }}">
        <a href="{{ route('admin.person.address.index',$person) }}" class="{{ $selected=='address_informations' ? 'text-white':'' }}">
            {{ __('app.address_informations') }}
        </a>
    </li>
    <li class="list-group-item">....</li>
    <li class="list-group-item">....</li>
    <li class="list-group-item">....</li>
    <li class="list-group-item">....</li>
    <li class="list-group-item">....</li>
</ul>
