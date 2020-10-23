<html>
    <head>
        <title>{page_title}</title>
    </head>
    <body>
        {if $role=='admin'}
            <h1>Welcome, Admin!</h1>
        {endif}
        <h1>{page_heading}</h1>
        <div>
           {subjects_list}
           <div id="data">
           <h3>{subject}</h3>
           <p>{abbr}</p>
           
           </div>
           {/subjects_list}
        </div>
        
        {noparse}
        <p>Welcome Hacking {literal}</p>
        {/noparse}
    </body>
</html>