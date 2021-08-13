<?php
class Pagination
{
	public $page;
	public $tpages;
	public $adjacents;

	function __construct($page, $tpages, $adjacents)
	{
		$this->page = $page;
		$this->tpages  = $tpages;
		$this->adjacents   = $adjacents;
	}

	public	function paginatePinturas()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosPinturas(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateFlex()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarConceptosFlex(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateUltimosCostos()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarUltimosCostos(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasCliente()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(1,'')'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(" . ($page - 1) . ",'')'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(1,'')'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(1,'')'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(" . $i . ",'')'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente($tpages,'')'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCliente(" . ($page + 1) . ",'')'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasCanal()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanal(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasAgente()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgente(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoMonto()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(1,'','')'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(" . ($page - 1) . ",'','')'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(1,'','')'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(1,'','')'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(" . $i . ",'','')'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto($tpages,'','')'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMonto(" . ($page + 1) . ",'','')'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoUnidades()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(1,'','')'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(" . ($page - 1) . ",'','')'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(1,'','')'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(1,'','')'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(" . $i . ",'','')'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades($tpages,'','')'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidades(" . ($page + 1) . ",'','')'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasClienteAnual()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasClienteAnual(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasCanalAnual()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasCanalAnual(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasAgenteAnual()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasAgenteAnual(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoMontoAnual()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoMontoAnual(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoUnidadesAnual()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='cargarVentasProductoUnidadesAnual(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateListaClientes()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClients(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateListaClientesVenta()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadClientsVenta(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateListaProductosVenta()
	{

		$page = $this->page;
		$tpages = $this->tpages;
		$adjacents = $this->adjacents;

		$prevlabel = "&lsaquo; Anterior";
		$nextlabel = "Siguiente &rsaquo;";
		$out = '<ul class="pagination   pull-right">';
		// previous label

		if ($page == 1) {
			$out .= "<li class='page-item disabled'><a class='page-link'>$prevlabel</a></li>";
		} else if ($page == 2) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(1)'>1</a></li>";
		}
		// interval
		if ($page > ($adjacents + 2)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// pages

		$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
		$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out .= "<li class='active page-item'><a class='page-link'>$i</a></li>";
			} else if ($i == 1) {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='loadProductosVenta(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
}
