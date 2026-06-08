# link_check.ps1
# Scans all .html and .php files for external http(s) links and writes link_report.csv
$ErrorActionPreference = 'Continue'
$root = Split-Path -Path $MyInvocation.MyCommand.Definition -Parent
Write-Output "Scanning files under: $root"
$files = Get-ChildItem -Path $root -Include *.html,*.php -Recurse -File -ErrorAction SilentlyContinue
$found = @()
foreach ($f in $files) {
    $matches = Select-String -Path $f.FullName -Pattern 'https?://[^\s"\'>]+' -AllMatches -ErrorAction SilentlyContinue
    foreach ($m in $matches) {
        foreach ($mm in $m.Matches) {
            $found += [PSCustomObject]@{File=$f.FullName; URL=$mm.Value}
        }
    }
}
$unique = $found | Select-Object -Property URL -Unique
$results = @()
if ($unique.Count -eq 0) {
    Write-Output 'No external http/https links found.'
} else {
    Write-Output "Found $($unique.Count) unique external link(s). Checking status..."
    foreach ($u in $unique) {
        $url = $u.URL
        try {
            $r = Invoke-WebRequest -Uri $url -Method Head -TimeoutSec 15 -UseBasicParsing -ErrorAction Stop
            $status = $r.StatusCode
        } catch {
            $status = $_.Exception.Message -replace '\r|\n', ' '
        }
        $results += [PSCustomObject]@{URL=$url; Status=$status}
    }
    $results | Format-Table -AutoSize
}
$csvPath = Join-Path $root 'link_report.csv'
$results | Export-Csv -Path $csvPath -NoTypeInformation -Encoding UTF8 -Force
Write-Output "Saved report to $csvPath"