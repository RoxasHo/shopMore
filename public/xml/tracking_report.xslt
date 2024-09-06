<!-- LKY -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">

    <xsl:output method="html" indent="yes" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN"/>

    <xsl:template match="/report">
        <html>
            <head>
                <title>Tracking Report</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                    }
                </style>
            </head>
            <body>
                <h1>Tracking Report</h1>
                <table>
                    <!-- Header row -->
                    <tr>
                        <th style="width:10%">Tracking ID</th>
                        <th style="width:10%">Order ID</th>
                        <th style="width:35%">Order Item</th>
                        <th style="width:10%">User ID</th>
                        <th style="width:15%">Status</th>
                        <th style="width:20%">Date Time</th>
                    </tr>
                    <!-- Apply templates to process each 'tracking' element -->
                    <xsl:apply-templates select="tracking"/>
                </table>
            </body>
        </html>
    </xsl:template>

    <!-- Template to process each 'tracking' element -->
    <xsl:template match="tracking">
        <tr>
            <td><xsl:value-of select="@id"/></td>
            <td><xsl:value-of select="ordID"/></td>
            <td><xsl:value-of select="ordItm"/></td>
            <td><xsl:value-of select="usrID"/></td>
            <td style="color:red"><xsl:value-of select="status"/></td>
            <td><xsl:value-of select="dateTime"/></td>
        </tr>
    </xsl:template>

</xsl:stylesheet>
