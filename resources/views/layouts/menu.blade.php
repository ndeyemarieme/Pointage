<li class="{{ Request::is('utilisateurs*') ? 'active' : '' }}">
    <a href="{!! route('utilisateurs.index') !!}"><i class="fa fa-edit"></i><span>utilisateurs</span></a>
</li>

<li class="{{ Request::is('fonctions*') ? 'active' : '' }}">
    <a href="{!! route('fonctions.index') !!}"><i class="fa fa-edit"></i><span>fonctions</span></a>
</li>

<li class="{{ Request::is('employers*') ? 'active' : '' }}">
    <a href="{!! route('employers.index') !!}"><i class="fa fa-edit"></i><span>employers</span></a>
</li>


<li class="{{ Request::is('pointers*') ? 'active' : '' }}">
    <a href="{!! route('pointers.index') !!}"><i class="fa fa-edit"></i><span>pointers</span></a>
</li>

