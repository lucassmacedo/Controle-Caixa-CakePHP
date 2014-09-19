<?php

class SiteHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

    public function getCategoryPath($category_id, $generateLinks = true, $separator = ' » ') {
        App::uses('Category', 'Model');
        $Category = new Category();

        $path = $Category->getPath($category_id);

        $out = array();
        foreach ($path AS $step) {
            $tmp = $step['Category']['name'];

            if ($generateLinks) {
                $tmp = $this->Html->link(
                        $step['Category']['name'], "/{$step['Category']['slug']}-{$step['Category']['id']}", array(
                    'title' => $step['Category']['title'],
                    'escape' => false,
                        )
                );
            }

            $out[] = $tmp;
        }

        return implode($separator, $out);
    }

    public function makeMenuItem($label, $url) {
        // $activeClass = checkRoute("{$url['controller']}#{$url['action']}") ? 'active' : '';
        return $this->Html->tag('li', $this->Html->link($label, $url, array('escape' => false))
        );
    }

    public function describePaymentMethods($order) {
        $output = '';

        if ($order['payment_method'] == 'cielo') {
            $output .= 'Cartão Crédito';

            switch ($order['cc_brand']) {
                case 'visa': $output .= ' Visa';
                    break;
                case 'mastercard': $output .= ' Mastercard';
                    break;
                case 'diners': $output .= ' Diners';
                    break;
                case 'amex': $output .= ' Ametican Express';
                    break;
                case 'elo': $output .= ' Elo';
                    break;
                case 'discover': $output .= ' Discover';
                    break;
            }

            $output .= " ({$order['payment_installments']}x)";
        }

        if ($order['payment_method'] == 'boleto_bb') {
            $output .= "Boleto BB";

            if (!empty($order['boleto_url'])) {
                $output .= " (<a href=\"{$order['boleto_url']}\" target=\"_blank\">visualizar</a>)";
            }
        }

        if ($order['payment_method'] == 'deposito_bb') {
            $output .= 'Depósito BB';
        }

        if ($order['payment_method'] == 'pagseguro') {
            $output .= 'PagSeguro';

            if ($order['status'] == '1') {
                $linkPagamento = $this->Html->link(
                    'Concluir Pagamento',
                    Router::url(array('controller' => 'checkout', 'action' => 'customer_redirectPagseguro', $order['id']), true),
                    array('target' => '_blank', 'title' => 'Pagar via PagSeguro', 'escape' => false)
                );
                
                $output .= " ({$linkPagamento})";
            }
        }

        if ($order['payment_method'] == 'moip') {
            $output .= 'Cartão Crédito MoIP';

            switch ($order['cc_brand']) {
                case 'visa': $output .= ' Visa';
                    break;
                case 'mastercard': $output .= ' Mastercard';
                    break;
                case 'diners': $output .= ' Diners';
                    break;
                case 'amex': $output .= ' American Express';
                    break;
                case 'hipercard': $output .= ' Hipercard';
                    break;
                case 'aura': $output .= ' Aura';
                    break;
                case 'oipaggo': $output .= ' Oipaggo';
                    break;
            }

            $output .= " ({$order['payment_installments']}x)";
        }

        if ($order['payment_method'] == '') {
            $output = "Não Informado";
        }

        return $output;
    }

    public function describeStatus($order, $full = false) {
        $output = '';

        $status = $order['status'];

        $statusMessages = Configure::read('Order.status');
        $statusInfos = Configure::read('Order.admin.status');

        $statusText = $full ? $statusMessages[$status] : $statusInfos[$status]['text'];

        $output .= $this->Html->tag(
                'span', $statusText, array(
            'title' => $statusMessages[$status],
            'class' => 'label pull-right',
            'style' => "background-color: #{$statusInfos[$status]['color']};",
                )
        );

        return $output;
    }

    public function describeStatusToPdf($order, $full = false) {
        $output = '';

        $status = $order['status'];

        $statusMessages = Configure::read('Order.status');
        $statusInfos = Configure::read('Order.admin.status');

        $statusText = $full ? $statusMessages[$status] : $statusInfos[$status]['text'];

        $output .= $this->Html->tag(
                'span', $statusText, array(
            'title' => $statusMessages[$status],
            'class' => 'label pull-right',
            'style' => "color: #{$statusInfos[$status]['color']};font-weight:bold",
         )
        );

        return $output;
    }

}
