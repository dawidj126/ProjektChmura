<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #1a1a1a; margin: 40px; }
  h1 { text-align: center; font-size: 18px; margin-bottom: 30px; }
  h2 { font-size: 13px; border-bottom: 1px solid #ccc; padding-bottom: 4px; margin-top: 24px; }
  table { width: 100%; border-collapse: collapse; margin-top: 10px; }
  td { padding: 5px 8px; vertical-align: top; }
  td:first-child { font-weight: bold; width: 40%; }
  .section { margin-bottom: 20px; }
  .footer { margin-top: 60px; display: flex; justify-content: space-between; }
  .signature { text-align: center; width: 45%; border-top: 1px solid #333; padding-top: 8px; font-size: 11px; }
</style>
</head>
<body>

<h1>UMOWA NAJMU LOKALU</h1>

<p style="text-align:center; margin-bottom:30px;">
  Wygenerowano: {{ now()->format('d.m.Y') }} &nbsp;|&nbsp; Nr umowy: {{ $contract->id }}
</p>

<div class="section">
  <h2>§1. Strony umowy</h2>
  <table>
    <tr><td>Wynajmujący:</td><td>{{ $contract->owner_name ?? '—' }}</td></tr>
    <tr><td>Adres wynajmującego:</td><td>{{ $contract->owner_address ?? '—' }}</td></tr>
    <tr><td>Nr dowodu (wynajmujący):</td><td>{{ $contract->owner_id_number ?? '—' }}</td></tr>
  </table>
  <table style="margin-top:10px">
    <tr><td>Najemca:</td><td>{{ $contract->tenant_name ?? '—' }}</td></tr>
    <tr><td>Adres najemcy:</td><td>{{ $contract->tenant_address ?? '—' }}</td></tr>
    <tr><td>Nr dowodu (najemca):</td><td>{{ $contract->tenant_id_number ?? '—' }}</td></tr>
  </table>
</div>

<div class="section">
  <h2>§2. Przedmiot najmu</h2>
  <table>
    <tr><td>Typ nieruchomości:</td><td>{{ $contract->property_type === 'apartment' ? 'Mieszkanie' : 'Pokój' }}</td></tr>
    <tr><td>Adres nieruchomości:</td><td>{{ $contract->property_address ?? '—' }}</td></tr>
  </table>
</div>

<div class="section">
  <h2>§3. Warunki finansowe</h2>
  <table>
    <tr><td>Czynsz miesięczny:</td><td>{{ number_format($contract->rental_price, 2, ',', ' ') }} zł</td></tr>
    @if($contract->admin_fee)
    <tr><td>Czynsz administracyjny:</td><td>{{ number_format($contract->admin_fee, 2, ',', ' ') }} zł</td></tr>
    @endif
    @if($contract->deposit_amount)
    <tr><td>Kaucja:</td><td>{{ number_format($contract->deposit_amount, 2, ',', ' ') }} zł</td></tr>
    @endif
  </table>
</div>

<div class="section">
  <h2>§4. Okres najmu</h2>
  <table>
    <tr><td>Data rozpoczęcia:</td><td>{{ $contract->start_date?->format('d.m.Y') ?? '—' }}</td></tr>
    <tr><td>Data zakończenia:</td><td>{{ $contract->end_date?->format('d.m.Y') ?? 'Bezterminowo' }}</td></tr>
    @if($contract->rental_months)
    <tr><td>Czas trwania:</td><td>{{ $contract->rental_months }} miesięcy</td></tr>
    @endif
  </table>
</div>

@if($contract->conditions)
<div class="section">
  <h2>§5. Dodatkowe warunki</h2>
  <p>{{ $contract->conditions }}</p>
</div>
@endif

<p style="margin-top:40px; font-size:11px;">
  Niniejsza umowa ma charakter demonstracyjny i nie stanowi dokumentu prawnie wiążącego.
</p>

<div class="footer">
  <div class="signature">Podpis wynajmującego</div>
  <div class="signature">Podpis najemcy</div>
</div>

</body>
</html>
