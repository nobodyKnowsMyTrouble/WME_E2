<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <table>
    <tr bgcolor="#9acd32">
      <th>ID</th>
      <th>Country</th>
      <th>birth rate / 1000</th>
      <th>cellphones / 100</th>
      <th>children / women</th>
      <th>electric usage</th>
      <th>internet usage</th>
      <th>gdp_per_capita</th>
      <th>gdp_per_capita_growth</th>
      <th>inflation_annual</th>
      <th>life_expectancy</th>
      <th>military_expenditure_percent_of_gdp</th>
      <th>gps_lat</th>
      <th>gps_long</th>
    </tr>
    <xsl:for-each select="/Countries/Country">
    <tr>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="name"/></td>
      <td><xsl:value-of select="birth_rate_per_1000"/></td>
      <td><xsl:value-of select="cell_phones_per_100"/></td>
      <td><xsl:value-of select="children_per_woman"/></td>
      <td><xsl:value-of select="electricity_consumption_per_capita"/></td>
      <td><xsl:value-of select="internet_user_per_100"/></td>
      <td><xsl:value-of select="gdp_per_capita"/></td>
      <td><xsl:value-of select="gdp_per_capita_growth"/></td>
      <td><xsl:value-of select="inflation_annual"/></td>
      <td><xsl:value-of select="life_expectancy"/></td>
      <td><xsl:value-of select="military_expenditure_percent_of_gdp"/></td>
      <td><xsl:value-of select="gps_lat"/></td>
      <td><xsl:value-of select="gps_long"/></td>
    </tr>
    </xsl:for-each>
  </table>
</xsl:template>
</xsl:stylesheet>
