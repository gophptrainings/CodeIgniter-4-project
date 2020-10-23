<html>
    <head>
        <title>{page_title|lower}</title>
    </head>
    <body>
        <h1>{page_heading|upper|limit_chars(5)}</h1>
        <p>DOB: {date|date(l dS F Y)}</p>
        <p>DOB: {date|date_modify(+5days)|date(l dS F Y)}</p>
        <p>Price: {price|local_currency(EUR)|highlight_code}</p>
        <p>Price Data: {offer|round(ceil)}</p>
        <h1>Applying Custom View Filters</h1>
        <h3>Mobile: {mobile|hidenumbers(4)}</h3>
        <h4>{page_heading} contains {page_heading|vowelscount} vowels</h4>
    </body>
</html>