<html>
    <head>
        <title>{page_title}</title>
    </head>
    <body>
           <h1>{page_heading|shuffle}</h1>
           
           {subjects_list}
           <h1>{subject}</h1>
           <p>{abbr}</p>
           
           {/subjects_list}
           {if $status}
           <p>Welcome to CI4</p>
           {endif}
           
    </body>
</html>
