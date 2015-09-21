{{Form::open(array('route'=> 'storeLinkedIn','files'=>true, 'id'=>'linkedInForm', 'name' => 'linkedInForm'))}}

{{Form::hidden('linkedInId', '', array('id'=>'linkedInId'))}}

{{Form::hidden('linkedInEmail', '', array('id'=>'linkedInEmail'))}}

{{Form::hidden('linkedInName', '', array('id'=>'linkedInName'))}}

{{Form::hidden('linkedInSurname', '', array('id' => 'linkedInSurname'))}}

{{Form::hidden('linkedInHeadline', '', array('id' => 'linkedInHeadline'))}}

{{Form::hidden('linkedInPictureUrl', '', array('id' =>'linkedInPictureUrl'))}}

{{Form::close()}}