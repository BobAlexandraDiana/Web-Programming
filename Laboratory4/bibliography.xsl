<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </link>
    <style>
        .table
        {
            border:solid;
            border-color: gray;
            font-family: 'Courier New', Courier, monospace;
            width: 600px;
            margin-left:300px;
        }
        .lead
        {
            text-align:center;
        }
    </style>
</head>
<body>
    <p class="lead well"> Bibliography list </p>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th class="text-uppercase h4">Title</th>
                <th class="text-uppercase h4">Author</th>
                <th class="text-uppercase h4">Year</th>
            </tr>
        </thead>

        <tbody>
            <xsl:for-each select="bibliographies/bibliography">

            <xsl:sort select="title"/>

            <xsl:if test="author='Martin'">

            <tr>
                <td><xsl:value-of select="title"/></td>
                <td><xsl:value-of select="author"/></td>
                <td><xsl:value-of select="year"/></td>
             </tr>

            </xsl:if>

            </xsl:for-each>
            
        </tbody>
    </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
  