<?php

$clubID = get_option('bsvErgebnisdienstClubID');
$base_url = 'https://bsv-ergebnisdienst.de/main.php?p1=0:mm::'.$clubID;
$xml_url = $base_url.'&style=2';

$request = wp_safe_remote_get($xml_url);
$body = wp_remote_retrieve_body($request);
$xml = simplexml_load_string($body);



?>

<style>
	.portfoliocard {
		box-shadow: 3px 3px 18px 0 <?= get_option('portfolioPluginShadowColor') ?>;
	}

	.portfoliocard:hover .portfoliotechnologyitem {
		background-color: <?= get_option('portfolioPluginAttributeBGColorHover') ?>;
		color: <?= get_option('portfolioPluginAttributeTextColorHover') ?>;
	}

	.portfoliocard:hover {
		box-shadow: -4px -4px 18px 0 <?= get_option('portfolioPluginShadowColorHover') ?>;
	}

	a,
	a:hover,
	a:visited {
		color: <?= get_option('portfolioPluginTextColorHover') ?>;
	}
</style>

<div class="container mx-auto">
	<div class="p-4">


		<table class="table-auto">
			<thead>
				<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
					<th class="py-1 px-2 text-left">Rang</th>
					<th class="py-1 px-2 text-left">Status</th>
					<th class="py-1 px-2 text-left">Mgl.Nr.</th>
					<th class="py-1 px-2 text-left">Spielername</th>
					<th class="py-1 px-2 text-left">Titel</th>
					<th class="py-1 px-2 text-left">DWZ</th>
					<th class="py-1 px-2 text-left">Index</th>
					<th class="py-1 px-2 text-left">l.Ausw.</th>
					<th class="py-1 px-2 text-left">ELO</th>
					<th class="py-1 px-2 text-left">ELO-ID</th>
					<th class="py-1 px-2 text-left">Land</th>
				</tr>

			</thead>
			<tbody class="text-gray-600 text-sm font-light">
				<?php
				foreach ($xml->EINZEL as $user) {
				?>
					<tr class="border-b border-gray-200 hover:bg-gray-100">

						<td class="py-0 px-2 text-center whitespace-nowrap">
							<?= $user->RANG ?>
						</td>
						<td class="py-1 px-2 text-left whitespace-nowrap">
							<?= $user->STATUS ?>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->MGLNR ?>
						</td>
						<td class="py-1 px-2 text-left whitespace-nowrap">
							<a href="https://www.schachbund.de/spieler/<?=$clubID?>-<?=$user->MGLNR?>.html">
								<?= $user->NAME ?>
							</a>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->TITEL ?>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<a href="https://www.schachbund.de/spieler/<?=$clubID?>-<?=$user->MGLNR?>.html">
								<?= $user->DWZ ?>
							</a>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->DWZINDEX ?>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->DWZAUSW ?>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->ELO ?>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<a href="https://ratings.fide.com/profile/<?=$user->ELOID?>">
								<?= $user->ELOID ?>
							</a>
						</td>
						<td class="py-1 px-2 text-center whitespace-nowrap">
							<?= $user->ELOLAND ?>
						</td>
					</tr>
				<?php
				}
				?>



			</tbody>

		</table>
		<h5>Quelle: <a href="<?=$base_url?>">BSV Ergebnisdienst</h5>


	</div>

</div>