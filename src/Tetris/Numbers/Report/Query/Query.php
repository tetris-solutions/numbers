<?php

namespace Tetris\Numbers\Report\Query;

use Tetris\Numbers\Report\MetaData\MetaData;
use Tetris\Numbers\Report\Report;

class Query extends Base
{
    protected function mountMetric(string $id): array
    {
        $metric = MetaData::getMetric($id);
        $source = MetaData::getMetricSource($this->platform, $this->entity, $id);

        if (isset($metric['names'][$this->locale])) {
            $metric['name'] = $metric['names'][$this->locale];
        } else {
            $metric['name'] = MetaData::getFieldName($this->locale, $this->platform, $id);
        }

        return [
            'id' => $metric['id'],
            'name' => $metric['name'],
            'type' => $metric['type'],
            'metric' => $source['metric'],
            'parse' => $source['parse'],
            'inferred_from' => $source['inferred_from'] ?? [],
            'entity' => $this->entity,
            'platform' => $this->platform,
            'fields' => $source['fields'],
            'report' => $source['report'],
            'sum' => $source['sum'] ?? null
        ];
    }

    protected function setupReport()
    {
        $this->report = new Report($this->platform, $this->metrics[0]['report']);

        foreach ($this->metrics as $metric) {
            $this->report->addMetric($metric, false);
        }

        foreach ($this->dimensions as $dimension) {
            $this->report->addDimension($dimension);
        }

        foreach ($this->metrics as $metric) {
            foreach ($metric['inferred_from'] as $subMetric) {
                $this->report->addMetric($this->mountMetric($subMetric), true);
            }
        }

        foreach ($this->filters as $name => $values) {
            $attribute = $this->report->addFilter($name, $values);

            if ($attribute['is_dimension'] && $name !== 'id') {
                $this->report->addDimension($attribute['id'], true);
            }

            if ($attribute['is_metric']) {
                $this->report->addMetric($this->mountMetric($attribute['id']), true);
            }
        }
    }
}
