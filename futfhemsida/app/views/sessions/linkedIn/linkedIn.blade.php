<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 77e3scl45rkt93
    authorize: false
    onLoad: onLinkedInLoad
    lang: sv_SE
</script>

<script>
function onLinkedInLoad() {
    IN.Event.on(IN, "auth", getProfileData);
}

// Handle the successful return from the API call
function onSuccess(data) {
    console.log(data);
    $(document).ready(function() {

    $("#linkedInEmail").val(data["emailAddress"]);
    $("#linkedInId").val(data["id"]);
    $("#linkedInName").val(data["firstName"]);
    $("#linkedInSurname").val(data["lastName"]);
    $("#linkedInHeadline").val(data["headline"]);
    $("#linkedInPictureUrl").val(data["pictureUrl"]);
    $("#linkedInForm").submit();



    });
}

// Handle an error response from the API call
function onError(error) {
    console.log(error);
}

// Use the API call wrapper to request the member's basic profile data
function getProfileData() {
    IN.API.Raw("/people/~:(id,first-name,last-name,headline,email-address,picture-url)").result(onSuccess).error(onError);

}
</script>