@extends('layouts.default')

<style>
    @media (min-width: 768px) {
        #adjust {
            left: -187.5px;
        {{-- -187.5 px to replace the column of width 3 to the left (col-sm-3 =3*750px/12=187.5 px) on big screen--}}


































        }
    }
</style>

@section('content')
    <div id="adjust" style="position: relative;">
        <h3><u>Cookieriktlinjer</u></h3>
        <h4>Vad är en cookie?</h4>
        <p>
            En cookie (eller kaka) är en textfil som är liten. Denna textfil kan begäras av webbplatser för att sedan
            sparas på besökarens dator. Idag används cookies på många webbplatser för att ge besökaren atkomst till
            flera olika funktioner. Cookies information kan också användas för att följa en användares surfande på
            webbplatser som använder samma cookie.
        </p>
        <br>
        <h4>Varför använder FUTF cookies?</h4>
        <p>
            Den huvudsakliga anledningen varför FUTF använder cookies är för att vi för statistik på antalet besökare på
            denna hemsida. Ytterligare så använder Laravel cookies. Laravel är ett ramverk som <a href="creators">vi</a>
            använt oss av under uppbyggnaden av hemsidan. Dessutom använder sig LinkedIn av cookies på vår sida.
        </p>
        <br>
        <h4>Om jag inte accepterar cookies?</h4>
        <p>
            Om du inte accepterar användandet av cookies kan du stänga av cookies i din webbläsares
            säkerhetsinställningar. Om du istället vill, så kan du ställa in att du får en varning varje gång
            hemsidan försöker använda sig av cookies.
        </p>
        <br>
        <h4>Olika typer av cookies</h4>
        <p>
            Det finns två olika typer av cookies.
        <ul>
            <li>
                En permanent cookie ligger kvar på besökarens dator under en bestämd tid.
            </li>
            <li>
                En sessionscookie lagras tillfälligt i datorns minne under tiden en besökare är inne på en webbsida.
                Sessioncookies försvinner när du stänger din webbläsare.
            </li>
        </ul>
        En permanent cookie sparar en fil under en längre tid på besökarens dator, cookien har
        ges ett utgångsdatum vid skapandet. En permanent cookie används till exempel vid funktioner som talar om vad som
        är nytt sedan användaren, senast användaren besökte hemsidan. När utgångsdatumet passerats kommer cookien att
        raderas då användaren återkommer till hemsidan.
        <br>
        <br>
        En sessionscookie saknar utgångsdatum. Under tiden en användare är inne och surfar på hemsidan, lagras den här
        kakan temporärt i användarens datorminne. Detta sker exempelvis för att hålla reda på vilket språk denne har
        valt. Sessionscookies lagras inte under en längre tid på användarensdator, utan försvinner när användaren
        stänger sin webbläsare.
        </p>
    </div>
@stop
