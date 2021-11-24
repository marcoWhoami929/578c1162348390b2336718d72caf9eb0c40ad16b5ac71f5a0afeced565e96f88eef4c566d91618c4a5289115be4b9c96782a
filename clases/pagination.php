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
	public	function paginateVentasCliente($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}

	public	function paginateVentasCanal($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasAgente($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoMonto($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1')'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasProductoUnidades($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasLitreadoMonto($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1')'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasLitreadoUnidades($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasMarca($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateVentasYearToDay($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateDetalleVentasClientes($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	public	function paginateDetalleVentasProductos($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}

	public	function paginateListaClientes($vista)
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
	public	function paginateBitacora($vista)
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
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$prevlabel</a></li>";
		} else {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page - 1) . ")'>$prevlabel</a></li>";
		}
		// first label
		if ($page > ($adjacents + 1)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>1</a></li>";
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
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(1)'>$i</a></li>";
			} else {
				$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . $i . ")'>$i</a></li>";
			}
		}

		// interval

		if ($page < ($tpages - $adjacents - 1)) {
			$out .= "<li class='page-item'><a class='page-link'>...</a></li>";
		}

		// last

		if ($page < ($tpages - $adjacents)) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista($tpages)'>$tpages</a></li>";
		}

		// next

		if ($page < $tpages) {
			$out .= "<li class='page-item'><a class='page-link' href='javascript:void(0);' onclick='$vista(" . ($page + 1) . ")'>$nextlabel</a></li>";
		} else {
			$out .= "<li class='disabled page-item'><a class='page-link'>$nextlabel</a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
}
